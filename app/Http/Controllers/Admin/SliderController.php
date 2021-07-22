<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Slider $slider)
    {
        $slider->getMedia();
        $data = $slider->get()->each(function ($rows) use ($slider) {
            $rows->images = $slider->getFirstMediaUrl('slider');
        });
        return inertia('admin/slider', [
            'title' => 'SLIDER',
            'data' => $data,
            'media' => $slider->getMedia()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $slider = new Slider($request->except(['images', 'isUpload', 'file']));
        $slider->seq_no = $slider->max('seq_no');
        $slider->save();
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $slider->addMediaFromRequest('file')->toMediaCollection('slider');
        } else {
            $slider->addMediaFromUrl($request->images)->toMediaCollection('slider');
        }

        return $this->index($slider);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
