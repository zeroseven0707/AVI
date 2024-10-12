@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <table class="table table-responsive table-striped mt-3">
        <thead>
            <tr>
                <th>Midtrans Order Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $campaign)
            <tr>
                <td>{{ $campaign->midtrans_order_id }}</td>
                <td>{{ $campaign->name }}</td>
                <td>{{ $campaign->email }}</td>
                <td>{{ $campaign->no_telp }}</td>
                <td>{{ $campaign->donation_date }}</td>
                <td>{{ number_format($campaign->amount) }}</td>
                <td>{{ $campaign->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
