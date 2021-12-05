@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($skill->name) }}</div>

                    <div class="card-body">




                        @foreach ($tasks as $task)

                            {{ $task->name }} - {{ $task->item->name }}

                        @endforeach





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
