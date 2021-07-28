<?php

namespace App\View\Components\Blog;

use Async;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class Posts extends Component
{
    public $posts;

    public $perPage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($perPage = 10)
    {
        $this->perPage = (int) $perPage;
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
        $response  = Http::get(env('WP_API') . '/posts', [
            'per_page' => $this->perPage,
            'status' => 'publish'
        ]);
        return $response->object();
    }
}
