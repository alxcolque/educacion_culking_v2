<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;
    public function render()
    {
        $posts = Post::where('status', 3)
            ->where('title','LIKE','%'.$this->search.'%')
            ->latest('id')
            ->paginate(12);
        return view('livewire.post.posts', compact('posts'));
    }
}
