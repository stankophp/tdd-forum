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

        @if (auth()->check())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ $thread->path().'/replies' }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
        @else
            <p class="text-center">Please <a href="{{ route('login') }}">login</a> to comment</p>
        @endif

    </div>
@endsection
