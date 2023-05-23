@extends('layouts.app')

@section('content')

    <h1>マイブログ</h1>

    <a href="/mypage/blogs/create"> ブログ新規登録　</a>
    <hr>

    <table>
        <tr>
            <th>ブログ一覧</th>
        </tr>

        @foreach($blogs as $blog)
            <tr>
                <td>
                    {{ $blog->title }}
                </td>
            </tr>
        @endforeach
    </table>

@endsection
