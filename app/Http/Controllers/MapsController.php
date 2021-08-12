<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MapsController extends Controller
{
    public function getProv(Request $request)
    {
        // return Map::loadProv($request->query('isObj', false));
        return Cache::rememberForever("getProv", function () {
            return Map::loadProv(request('isObj', false));
        });

        // return Map::groupAll();
    }

    public function getKab(Request $request)
    {
        $request->validate([
            'prov_code' => 'required'
        ]);

        return Cache::rememberForever("getKab", function () {
            return Map::loadKab(request('prov_code'), request('isObj', false));
        });
    }

    public function getKec(Request $request)
    {
        $request->validate([
            'kab_code' => 'required'
        ]);

        return Cache::rememberForever("getKec", function () {
            return Map::loadKec(request('kab_code'), request('isObj', false));
        });
    }

    public function getKel(Request $request)
    {
        $request->validate([
            'kec_code' => 'required'
        ]);

        return Cache::rememberForever("getKel", function () {
            return Map::loadKel(request('kec_code'), request('isObj', false));
        });

        // return Map::loadKel($request->query('kec_code'), $request->query('isObj', false));
    }
}
