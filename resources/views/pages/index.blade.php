@extends('layouts.app') <!-- go to layouts folder and get app.blade.php file -->

@section('content')
    <div class="jumbotron">
        <div class="container text-center">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p>
              <a class="btn btn-primary btn-lg disabled" href="/login" role="button">Login »</a>
              <a class="btn btn-success btn-lg disabled" href="/register" role="button">Register »</a>
          </p>
        </div>
      </div>
@endsection

