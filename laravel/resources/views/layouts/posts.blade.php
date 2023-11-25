@extends('layouts.master')

@section('title', 'Posts')

@section('content')

<div id="data-wrapper">
   <h2>Posts</h2>
   @foreach ($posts as $post)
   <div class="post">
      <h3>{{ $post['title']['rendered'] }}</h3>
      {!! $post['content']['rendered'] !!}
   </div>
   @endforeach
</div>
@stop
