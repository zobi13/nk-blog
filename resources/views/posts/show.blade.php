@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h2>
        {{ $post->title }}
    </h2>

    <p>
        {{ $post->body }}
    </p>
    <h5>
        Comments
    </h5>
    @forelse($post->comments as $comment)
        {{ $comment->body }}
    @empty
        <span> No comments </span>
    @endforelse

    <form action="{{ route('createComment', ['post'=>$post->id]) }}" method='POST'>
        @csrf
        <div class="form-group">
            <label for="body">Add comment:</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            @error('body')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <button class="btn btn-primary"> Submit </button>
    </form>
@endsection