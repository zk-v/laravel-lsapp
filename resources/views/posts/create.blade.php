@extends('layouts.app')
@section('content')
    <h1>Create Post</h1>
    {{-- PostsController@store is the function we are submitting our form to --}}
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{-- Label for the first form input with the second parameter being displayed as the label text --}}
            {{Form::label('title', 'Title')}}
            {{-- Second parameter is input value which should be empty / we want to get it from the user --}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{-- Id adds the editor, transforming our form --}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection