<?php

namespace App\View\Components\Blog;

use Illuminate\View\Component;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

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
    public function __construct($mediaId, $type = 'images', $size = 'medium_large')
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
        $response = Http::pool(fn (Pool $pool) => [
            $pool->as($mediaId)->get(env('WP_API') . "/media/$mediaId"),
        ]);
        return $response[$mediaId]->object();
        // $response  = Http::get(env('WP_API') . "/media/$mediaId");
        // return $response->object();
    }
}
