<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        $request->user()->posts()->create($request->only('body'));
        
        Session::flash('success_message','Post has been created successfully!');

        return back();
    }
}
