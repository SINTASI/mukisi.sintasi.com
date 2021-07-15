<?php

namespace App\Http\Controllers\Admin;

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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuAdmin $menuAdmin)
    {
        //
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
