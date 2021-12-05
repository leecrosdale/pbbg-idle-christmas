@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($skill->name) }}</div>

                    <div class="card-body">

                        @foreach ($tasks as $task)
                            <a href="{{ route('task.start', $task) }}">
                                <div class="col-md-3 border m-3 p-3 bg-secondary text-white-50">
                                    {{ $task->name }} - {{ $task->item->name }}
                                    {{ $character->items()->where('item_id', $task->item->id)->first()->qty ?? 0 }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
