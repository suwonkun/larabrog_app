<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public function index(Request $request){
        $blogs = $request->user()->blogs;
        return view('mypage.index', compact('blogs'));
    }

    public function create(){
        return view('mypage.blog.create');
    }
}
