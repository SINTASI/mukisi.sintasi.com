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
        if (request('search', false)) {
            return Map::loadProv($request->query('isObj', false));
        }

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

        if (request('search', false)) {
            return Map::loadKab(request('prov_code'), request('isObj', false));
        }

        return Cache::rememberForever(request('prov_code'), function () {
            return Map::loadKab(request('prov_code'), request('isObj', false));
        });
    }

    public function getKec(Request $request)
    {
        $request->validate([
            'kab_code' => 'required'
        ]);

        if (request('search', false)) {
            return Map::loadKec(request('kab_code'), request('isObj', false));
        }

        return Cache::rememberForever(request('kab_code'), function () {
            return Map::loadKec(request('kab_code'), request('isObj', false));
        });
    }

    public function getKel(Request $request)
    {
        $request->validate([
            'kec_code' => 'required'
        ]);

        if (request('search', false)) {
            return Map::loadKel(request('kec_code'), request('isObj', false));
        }

        return Cache::rememberForever(request('kec_code'), function () {
            return Map::loadKel(request('kec_code'), request('isObj', false));
        });

        // return Map::loadKel($request->query('kec_code'), $request->query('isObj', false));
    }
}
