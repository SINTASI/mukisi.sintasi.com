<?php

namespace App\Http\Controllers\Admin\Master;


use App\Http\Controllers\Controller;
use App\Models\Admin\MenuAdmin;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('admin/master/menu', [
            'title' => 'MASTER MENU'
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
            'link' => 'required',
            'parent' => 'required',
        ]);

        $seq_no = MenuAdmin::where('parent', request('parent'))->max('seq_no') + 1;

        MenuAdmin::create($request->all());

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(MenuAdmin $menuAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuAdmin $menuAdmin)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuAdmin $menuAdmin, $id)
    {
        $menuAdmin->where('id', $id)->update(
            $request->validate([
                'name' => 'required',
                'icon' => 'required',
                'link' => 'required',
            ])
        );
        return response([
            'message' => "$request->name Berhasil di update"
        ]);
    }

    public function dropDown(Request $reques)
    {
        $menu = $reques->post('menu', []);
        foreach ($menu as $key => $value) {
            MenuAdmin::where('id', $value['id'])->update([
                'seq_no' => $key
            ]);
        }
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuAdmin $menuAdmin)
    {
        //
    }
}
