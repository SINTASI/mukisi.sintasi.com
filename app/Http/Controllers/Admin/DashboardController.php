<?php

namespace App\Http\Controllers\Admin;

use App\Models\Map;
use App\Models\User;
use App\Models\Profesi;
use Illuminate\Http\Request;
use App\Models\MasterCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        if (request('xhr', false) && request()->has('method')) {
            $method = request('method');
            if (method_exists(DashboardController::class, $method)) {
                return response($this->{$method}());
            } else {
                return response(['message' => "Method $method not found"], 500);
            }
        }

        return inertia('admin/dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    protected function __maps()
    {
        $data = [];
        $qry = Map::whereRaw("LENGTH(code) = 2")->with('user_prov')->orderBy('name');
        foreach ($qry->get() as $rows) {
            $rows->label = $rows->name;
            $rows->value = count($rows->user_prov);
            if ($rows->value > 0) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    protected function __profesis()
    {
        return Profesi::where('active', true)
            ->get()
            ->each(function ($rows) {
                $rows->label = $rows->name;
                $rows->value =  User::where('profesi_id', $rows->id)->count();
            });
    }

    protected function __categorys()
    {
        return MasterCategory::where('type', 'anggota')
            ->get()
            ->each(function ($rows) {
                $rows->label = $rows->name;
                $rows->value =  User::where('category_id', $rows->id)->count();
            });
    }


    protected function __cards()
    {
        $institusi = User::where('type', 'institusi')->count();
        $personal = User::where('type', 'personal')->count();
        $data = [
            'institusi' => [
                'count' => $institusi,
                'label' => 'Anggota Institusi',
                'color' => 'green',
                'icon' => 'o_groups'
            ],
            'personal' => [
                'count' => $personal,
                'label' => 'Anggota Personal',
                'color' => 'green',
                'icon' => 'person_outline'
            ],
            'total' => [
                'count' => $institusi + $personal,
                'label' => 'Total Anggota',
                'color' => 'green',
                'icon' => 'o_done_all'
            ],
        ];
        return $data;
    }
}
