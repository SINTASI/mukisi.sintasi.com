<?php

namespace App\View\Components\Blog;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class DetailPost extends Component
{
    public $post;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slug)
    {
        $this->post = $this->loadPost($slug);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.detail-post');
    }


    public function loadPost($slug)
    {
        if (Cache::has("posts_$slug")) {
            return Cache::get("posts_$slug", []);
        }
        return Cache::remember("posts_$slug", now()->addMinutes(60), function () use ($slug) {
            $response = Http::get(env('WP_API') . "/posts", [
                'slug' => $slug
            ]);
            $post = $response[0]->object();
            $post->media = $this->loadMedia($post->featured_media);
            return $post;
        });
    }

    public function loadMedia($featured_media)
    {
        if (Cache::has("media_$featured_media")) {
            return Cache::get("media_$featured_media", []);
        }
        return Cache::remember("media_$featured_media", now()->addMinutes(60), function () use ($featured_media) {
            return Http::get(env('WP_API') . "/media/$featured_media")->object();
        });
    }
}
