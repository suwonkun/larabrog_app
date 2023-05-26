<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogSaveRequest;
use App\Models\Blog;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = $request->user()->blogs;
        return view('mypage.index', compact('blogs'));
    }

    public function create()
    {
        return view('mypage.blog.create');
    }

    public function store(BlogSaveRequest $request)
    {
        $data = $request->validated();

        $data['is_open'] = $request->boolean('is_open');

        $blog = $request->user()->blogs()->create($data);

        return redirect(route('mypage.blog.edit', $blog))->with('message', '新規登録しました');
    }

    public function edit(Blog $blog, Request $request)
    {
        if ($request->user()->isNot($blog->user)) {
            abort(403);
        }
        $data = old() ?: $blog;

        return view('mypage.blog.edit', compact('data'));
    }

    public function update(Blog $blog, BlogSaveRequest $request)
    {
        if ($request->user()->isNot($blog->user)) {
            abort(403);
        }

        $data = $request->validated();

        $data['is_open'] = $request->boolean('is_open');

        $blog->update($data);

        return redirect(route('mypage.blog.update', $blog))->with('message', 'ブログを更新しました');
    }
}
