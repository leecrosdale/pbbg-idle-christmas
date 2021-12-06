@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($skill->name) }}</div>

                    <div class="card-body">
                        @foreach ($tasks as $task)
                            <task-component
                                :task="{{ $task }}"
                                :item="{{ $task->item }}"
                                :start_quantity="{{ $character->items()->where('item_id', $task->item_id)->first()->quantity ?? 0 }}"
                                :quantity_per_tick="{{ $task->item_quantity }}"
                                :seconds_per_tick="{{ $task->time_in_seconds }}"
                                :active_task="{{ json_encode($character->active_task_id === $task->id) }}"
                            >
                            </task-component>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
