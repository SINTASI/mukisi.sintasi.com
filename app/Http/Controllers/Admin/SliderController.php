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
        $data = $slider->orderBy('seq_no')->get()->each(function ($rows) {
            $rows->images = $rows->getFirstMediaUrl('slider');
        });
        return inertia('admin/slider', [
            'title' => 'SLIDER',
            'data' => $data,
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
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $slider = Slider::create([
                'name' => request('name'),
                'seq_no' => Slider::where('active', true)->max('seq_no'),
            ]);

            if ($request->hasFile('file') && $request->file('file')->isValid() && $request->isUpload) {
                $slider->addMediaFromRequest('file')->toMediaCollection('slider');
            } else {
                $slider->addMediaFromUrl($request->images)->toMediaCollection('slider');
            }

            return redirect('/admin/slider')->with('success', 'Slider berhasil di simpan');
        } catch (\Throwable $th) {
            return redirect('/admin/slider')->with('error', $th->getMessage());
        }
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'key' => 'required',
                'value' => 'required',
            ]);
            Slider::where('id', $id)->update([
                $request->key => $request->value
            ]);
            return redirect('/admin/slider')->with('success', 'Slider berhasil di update');
        } catch (\Throwable $th) {
            return redirect('/admin/slider')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Slider::find($id)->delete();
            return redirect('/admin/slider')->with('success', 'Slider berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/admin/slider')->with('error', $th->getMessage());
        }
    }
}
