@extends('layouts.app')

@section('content')

    <h1>{{$blog->title}}</h1>
    <div>{!! nl2br(e($blog->body)) !!}</div>

    画像：<input type="file" name="pict">
    @if($blog->pict)
        <p><img src="{{Storage::url($blog->pict) }}" width="200"></p>
    @endif

    <p>書き手：{{$blog->user->name}}</p>

    <h2>コメント</h2>
    @foreach($blog->comments as $comment)
        <hr>
        <p>{{$comment->name}} ({{$comment->created_at}})</p>
        <p>{!! nl2br(e($comment->body)) !!}}</p>
    @endforeach

@endsection

