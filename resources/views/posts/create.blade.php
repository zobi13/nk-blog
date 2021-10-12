@extends('layouts.app')

@section('title', 'Create a post')

@section('content')
    <form action='/posts' method="POST">
        @csrf
        <div class="form-group">
            <label for="title">
                Title
            </label>
            <input placeholder="Enter title" id="title" name="title" type="text" class="form-control">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">
                Body
            </label>
            <textarea placeholder="Enter body"  id="body" name="body" name="" cols="30" rows="10"></textarea>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input id="is_published" name="is_published" type="checkbox" class="form-check-input" value=1>
            <label for="is_published" class="form-check-label">Publish right away</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection