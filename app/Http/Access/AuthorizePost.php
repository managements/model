<?php

namespace App\Http\Access;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait AuthorizePost
{
    protected function createPost()
    {
        return DB::table('users')
            ->leftJoin('posts','users.post_id','=','posts.id')
            ->leftJoin('category_posts','posts.category_id','=','category_posts.id')
            ->where([
                ['users.id',Auth::user()->id],
                ['category_posts.name','pdg']
            ])->orWhere([
                ['users.id',Auth::user()->id],
                ['category_posts.name','manager']
            ])->first();
    }
}