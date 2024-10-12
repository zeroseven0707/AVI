<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">To Do Lists</h4>
            <div class="add-items d-flex mb-0">
                <input type="text" wire:model="newTask" class="form-control todo-list-input"  placeholder="Add new task">
                <button wire:click="addTask" class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
            </div>
            <div class="list-wrapper pt-2">
                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                    @foreach($tasks as $task)
                    <li class="{{ $task->completed ? 'completed' : '' }}">
                        <div class="form-check form-check-flat">
                            <label class="">
                                <input wire:click="toggleComplete({{ $task->id }})" class="checkbox" type="checkbox" {{ $task->completed ? 'checked' : '' }}>
                                {{ $task->task }}
                            </label>
                        </div>
                        <i wire:click="deleteTask({{ $task->id }})" class="remove ti-close"></i>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>