<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    /* public function __construct()
    {

    } */
    public function author(User $user, Post $post){
        if($user->id == auth()->user()->id || $user->role == 'admin'){
            return true;
        }else{
            return false;
        }
    }
    public function status(User $user, Post $post){
        if($post->status == 3){
            return true;
        }else{
            return false;
        }
    }
    public function published(User $user, Post $post){
        if($post->status == 3){
            return true;
        }
        else{
            return false;
        }
    }
}
