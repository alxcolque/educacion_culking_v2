<?php

namespace App\Livewire\Welcome;

use App\Models\Post;
use Livewire\Component;

class NewsWelcome extends Component
{
    public $perPage = 12;
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
        //$news = User::latest()->paginate($this->perPage);
        $news = Post::where('status', 3)->latest('id')->limit(3)->get();
        //$this->emit('userStore');
        return view('livewire.welcome.news-welcome', compact('news'));
    }
}
