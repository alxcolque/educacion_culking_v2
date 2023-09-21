<?php

namespace App\Livewire\Welcome;

use App\Models\Post;
use Livewire\Component;

class CourseWelcome extends Component
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
        $courses = Post::where('status', 3)->where('type','curso')->latest('id')->limit(4)->get();
        //$this->emit('userStore');
        return view('livewire.welcome.course-welcome', compact('courses'));
    }
}
