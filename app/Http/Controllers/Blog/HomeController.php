<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\MPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request, $account)
    {
        $posts = MPost::where('account_id', $account)->paginate(20);
        return view('blog.default.welcome', [ 'posts' => $posts ]);
    }

    public function read(Request $request, $account, $slug)
    {
        $post = MPost::where('slug', $slug)->first();
        return view('blog.default.post', [ 'post' => $post ]);
    }


    
}
