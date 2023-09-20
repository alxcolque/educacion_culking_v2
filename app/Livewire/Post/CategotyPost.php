<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class CategotyPost extends Component
{
    public $id, $post_id;
    public function render()
    {
        $posts = Post::where('category_id', $this->id)
            ->where('status', 3)
            ->where('id','!=',$this->post_id)
            ->limit(10)
            ->latest('id')
            ->get();
        return view('livewire.post.categoty-post', compact('posts'));
    }
}
