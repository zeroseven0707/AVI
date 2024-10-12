<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function page()
    {
        return view('index');
    }
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('campaigns.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subcategories_id' => 'required',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);
    
        // Handle image upload and store paths in an array
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('campaigns', 'public'); // Store in 'storage/app/public/campaigns'
                $imagePaths[] = $path;
            }
        }
    
        // Save campaign data
        Campaign::create([
            'title' => $request->title,
            'subcategories_id' => (int) $request->subcategories_id,
            'description' => $request->description,
            'goal_amount' => $request->goal_amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => Auth::id(),
            'images' => json_encode($imagePaths), // Store the image paths as JSON
        ]);
    
        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully.');
    }
      

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaigns.show', compact('campaign'));
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subcategories_id' => 'required',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);
    
        $campaign = Campaign::findOrFail($id);
    
        // Handle image upload and update paths
        $imagePaths = json_decode($campaign->images, true); // Existing images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('campaigns', 'public');
                $imagePaths[] = $path;
            }
        }
    
        // Update campaign data
        $campaign->update([
            'title' => $request->title,
            'subcategories_id' => (int) $request->subcategories_id,
            'description' => $request->description,
            'goal_amount' => $request->goal_amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'images' => json_encode($imagePaths), // Update image paths
        ]);
    
        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully.');
    }
    

    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully.');
    }
}
