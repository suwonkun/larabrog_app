@extends('layouts.app')

@section('content')

    <h1>ブログの一覧</h1>

    <ul>
        @foreach($blogs as $blog)
            <li>{{ $blog->title }}</li>
        @endforeach
    </ul>
