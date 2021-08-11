<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function getProv(Request $request)
    {
        return Map::loadProv($request->query('isObj', false));
        // return Map::groupAll();
    }

    public function getKab(Request $request)
    {
        $request->validate([
            'prov_code' => 'required'
        ]);
        return Map::loadKab($request->query('prov_code'), $request->query('isObj', false));
    }

    public function getKec(Request $request)
    {
        $request->validate([
            'kab_code' => 'required'
        ]);
        return Map::loadKec($request->query('kab_code'), $request->query('isObj', false));
    }

    public function getKel(Request $request)
    {
        $request->validate([
            'kec_code' => 'required'
        ]);
        return Map::loadKel($request->query('kec_code'), $request->query('isObj', false));
    }
}
