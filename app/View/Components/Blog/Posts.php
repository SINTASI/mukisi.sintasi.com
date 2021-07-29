<?php

namespace App\View\Components\Blog;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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
        if (Cache::has("posts_$this->perPage")) {
            return Cache::get("posts_$this->perPage", []);
        }

        return Cache::remember("posts_$this->perPage", now()->addMinutes(60), function () {
            return Http::get(env('WP_API') . '/posts', [
                'per_page' => $this->perPage,
                'status' => 'publish'
            ])->object();
        });
    }
}
