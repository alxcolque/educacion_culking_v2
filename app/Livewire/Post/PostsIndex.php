<?php

namespace App\Livewire\Post;

use Livewire\Component;

use App\Models\Post;

use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
            ->where('title','LIKE','%'.$this->search.'%')
            ->latest('id')
            ->paginate(10);
        return view('livewire.post.posts-index', compact('posts'));
    }
}
