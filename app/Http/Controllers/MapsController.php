<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function getProv(Request $request)
    {
        return Map::loadProv(request('isObj', false));
    }

    public function getKab(Request $request)
    {
        $request->validate([
            'prov_code' => 'required'
        ]);

        return Map::loadKab(request('prov_code'), request('isObj', false));
    }

    public function getKec(Request $request)
    {
        $request->validate([
            'kab_code' => 'required'
        ]);

        return Map::loadKec(request('kab_code'), request('isObj', false));
    }

    public function getKel(Request $request)
    {
        $request->validate([
            'kec_code' => 'required'
        ]);

        return Map::loadKel(request('kec_code'), request('isObj', false));
    }
}
