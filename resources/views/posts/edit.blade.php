@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    {{-- Update the post by using PostsController@update with the id to located the correct post --}}
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{-- Label for the first form input with the second parameter being displayed as the label text --}}
            {{Form::label('title', 'Title')}}
            {{-- Second parameter is input value which the user submitted. It is availble to us at $post->title --}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{-- Id adds the editor, transforming our form --}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{-- Updating the form requires the PUT not POST method, so we need to include a hidden input / PUT request to achieve this --}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection