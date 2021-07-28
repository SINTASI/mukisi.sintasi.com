<?php

namespace App\View\Components\Blog;

use Async;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class Posts extends Component
{
    public array $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = $this->loadPosts();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.posts');
    }

    public function redirect($url)
    {
        // return redirect($url);
    }

    public function loadPosts()
    {
        // $pos = Async::run(fn () => Http::get(env('WP_API') . '/posts')->object())->wait();
        // return $pos[0];
        $response  = Http::get(env('WP_API') . '/posts');
        return $response->object();
    }
}
