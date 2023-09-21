<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Unit extends Component
{
    public $perPage = 2;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $units = Post::where('status', 3)
            ->where('type','unidad')
            ->orderBy('title')
            ->paginate($this->perPage);
        return view('livewire.post.unit', compact('units'));
    }
}
