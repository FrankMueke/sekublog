<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CatPagesController extends Controller
{
    public function getBusiness()
    {
        $posts = Post::where('category_id', '7')->orderBy('id', 'desc')->limit(15)->get();
        return view ('catpages.business')->withPosts($posts);
    }
    public function getFashion()
    {
        $posts = Post::where('category_id', '3')->limit(20)->get();
        return view ('catpages.fashion')->withPosts($posts);

    }
    public function getPolitics()
    {
        $posts = Post::where('category_id', '4')->limit(20)->get();
        return view ('catpages.politics')->withPosts($posts);
    }
    public function getTech()
    {
        $posts = Post::where('category_id', '15')->limit(20)->get();
        return view ('catpages.tech')->withPosts($posts);
    }
    public function getSports()
    {
        $posts = Post::where('category_id', '5')->limit(20)->get();
        return view ('catpages.sports')->withPosts($posts);
    }
}
