<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class AllPostsIndex extends Component
{
    public $search;
    public function render()
    {
        $allposts = [];
        if(auth()->user()->role == 'admin'){
            $allposts = Post::where('title','LIKE','%'.$this->search.'%')
            ->latest('id')
            ->get();
        }
        return view('livewire.post.all-posts-index', compact('allposts'));
    }
}
