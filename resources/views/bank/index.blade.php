@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bank') }}</div>

                    <div class="card-body">
                        <ul>
                        @foreach ($items as $item)
                            <li>{{ $item->item->name }} - {{ $item->quantity }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
