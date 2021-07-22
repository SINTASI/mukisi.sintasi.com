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
        $media = $slider->getMedia();
        // $yourModel->addMedia($pathToImage)
        $data = $slider->get()->each(function ($rows) use ($media) {
            $rows->images = $rows->getFirstMediaUrl('slider');
        });
        return inertia('admin/slider', [
            'title' => 'SLIDER',
            'data' => $data,
            'media' => $media
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

        // $slider = new Slider($request->except(['images', 'isUpload', 'file']));
        // $slider->seq_no = $slider->max('seq_no');
        // $slider->save();

        $slider = Slider::create([
            'name' => request('name'),
            'seq_no' => Slider::where('active', true)->max('seq_no'),
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid() && $request->isUpload) {
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
