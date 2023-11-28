@extends('layouts.master')

@section('title', 'Archive')

@section('content')
<div id="data-wrapper">
   <h2>Archive</h2>
   @foreach ($htmlPurifiedPosts as $htmlPurifiedPost)
   <div class="post">
      <h3>{{ $htmlPurifiedPost['title'] }}</h3>
      {!! $htmlPurifiedPost['content'] !!}
   </div>
   @endforeach
</div>
@stop
