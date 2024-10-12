<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoList extends Component
{
    public $newTask = '';
    public $tasks;

    public function mount()
    {
        // Memuat semua to-do list dari database
        $this->tasks = Todo::all();
    }

    public function addTask()
    {
        // Validasi input
        $this->validate([
            'newTask' => 'required|max:255',
        ]);

        // Menyimpan task baru ke database
        Todo::create([
            'task' => $this->newTask,
            'completed' => false,
        ]);

        // Memuat ulang tasks
        $this->tasks = Todo::all();

        // Reset input task baru
        $this->newTask = '';
    }

    public function toggleComplete($taskId)
    {
        // Menemukan task berdasarkan ID dan memperbarui status completed-nya
        $task = Todo::find($taskId);
        $task->completed = !$task->completed;
        $task->save();

        // Memuat ulang tasks
        $this->tasks = Todo::all();
    }

    public function deleteTask($taskId)
    {
        // Menghapus task
        Todo::find($taskId)->delete();

        // Memuat ulang tasks
        $this->tasks = Todo::all();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
