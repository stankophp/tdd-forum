@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="#">{{ $thread->creator->name }}</a> posted
                    <div class="card-header">{{ $thread->title }}</div>

                    <div class="card-body">
                        <div class="body">{{ $thread->body }}</div>
                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}

{{--    <div class="container">--}}
        @foreach($thread->replies as $reply)
            @include('threads.reply')
        @endforeach
    </div>
@endsection
