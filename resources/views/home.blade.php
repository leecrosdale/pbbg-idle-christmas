@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (auth()->user()->character->active_task_id)
                        Your current active task is {{ \App\Models\Task::find(auth()->user()->character->active_task_id)->title }}
                    @else

                        You have no active task!

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
