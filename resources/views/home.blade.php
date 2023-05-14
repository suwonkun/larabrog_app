@extends('layouts.app')

@section('content')

    <h1>ブログの一覧</h1>

    <ul>
        @foreach($blogs as $blog)
            <li>
                {{ $blog->title }} {{ $blog->user->name }}
                ({{$blog->comments_count}}件のコメント) <small>{{$blog->updated_at}}</small>
            </li>
        @endforeach
    </ul>
