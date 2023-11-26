@extends('layouts.master')

@section('title', 'Posts')

@section('content')

<div id="data-wrapper">
   <h2>Posts</h2>
   @foreach ($html_purified_posts as $html_purified_post)
   <div class="post">
      <h3>{{ $html_purified_post['title'] }}</h3>
      {!! $html_purified_post['content'] !!}
   </div>
   @endforeach
</div>
@stop
