<?php

namespace App\View\Components\Blog;

use Illuminate\View\Component;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Media extends Component
{
    public $type;
    public $size;
    public $media;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mediaId, $type = 'images', $size = 'td_324x235')
    {
        $this->media = $this->loadMedia($mediaId);
        $this->type = $type;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.media');
    }

    public function loadMedia($mediaId)
    {
        if (Cache::has("media_$mediaId")) {
            return Cache::get("media_$mediaId", []);
        }
        return Cache::remember("media_$mediaId", now()->addMinutes(60), function () use ($mediaId) {
            return Http::get(env('WP_API') . "/media/$mediaId")->object();
        });
    }
}
