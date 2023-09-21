<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;
class Procedure extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;
    public function render()
    {
        $posts = Post::where('status', 3)
            ->where('type','tramite')
            ->where('title','LIKE','%'.$this->search.'%')
            ->latest('id')
            ->paginate(12);
        return view('livewire.post.procedure', compact('posts'));
    }
}
