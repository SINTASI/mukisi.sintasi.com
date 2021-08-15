<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WpRevsliderSlide;
use Illuminate\Support\Facades\Http;

class WordpressController extends Controller
{
    public function index()
    {
        // $data = Http::get(env('WP_API') . "/media", [
        //     'search' => 'slider'
        // ])->collect();

        $data = WpRevsliderSlide::orderBy('slide_order')->find(77);

        dd($data);
    }
}
