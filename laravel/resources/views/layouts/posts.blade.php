@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
<div id="data-wrapper">
   @foreach ($posts as $post)
   <div class="post">
      <h2>{{ $post['title']['rendered'] }}</h2>
      {!! $post['content']['rendered'] !!}
   </div>
   @endforeach
</div>
@stop
