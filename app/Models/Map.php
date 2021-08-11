<?php

namespace App\Models;

use App\Models\MapsLine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Map extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function latlng()
    {
        return $this->hasOne(MapsLine::class, 'map_code', 'code');
    }


    public static function groupAll()
    {
        $search = request('search', false);
        $data = self::whereRaw("LENGTH(code) = 2")->get()->each(function ($rows)  use ($search) {
            $rows->children = self::where('code', 'like', "$rows->code%")
                ->whereRaw("LENGTH(code) = 5")->get()->each(function ($rows2)  use ($search) {
                    $rows2->children = self::where('code', 'like', "$rows2->code%")
                        ->whereRaw("LENGTH(code) = 8")->get()->each(function ($rows3)  use ($search) {
                            $rows3->children = self::where('code', 'like', "$rows3->code%")->whereRaw("LENGTH(code) = 13")->when($search, function ($q) use ($search) {
                                return $q->where("name", "like", "%$search%");
                            })->get();
                        });
                });
        });


        return response()->json([
            'data' => $data
        ]);
    }

    public static function getID($code)
    {
        return self::where('code', $code)->first('id');
    }

    public static function loadProv($isObj = false)
    {
        $qry = self::whereRaw("LENGTH(code) = 2");
        return self::mapResponse($qry, $isObj, 'Provinsi');
    }

    public static function loadKab(string $prov_code, $isObj = false)
    {
        $qry = self::whereRaw("LENGTH(code) = 5")->where('code', 'like', "$prov_code%");
        return self::mapResponse($qry, $isObj, 'Kabupaten/Kota');
    }


    public static function loadKec(string $kab_code, $isObj = false)
    {
        $qry = self::whereRaw("LENGTH(code) = 8")->where('code', 'like', "$kab_code%");
        return self::mapResponse($qry, $isObj, 'Kecamatan');
    }


    public static function loadKel(string $kec_code, $isObj = false)
    {
        $qry = self::whereRaw("LENGTH(code) = 13")->where('code', 'like', "$kec_code%");
        return self::mapResponse($qry, $isObj, 'Kelurahan');
    }

    public static function mapResponse($qry, $isObj, $label = "")
    {
        $html = "<option value>$label</option>";
        $search = request('search', false);
        $qry->when($search, function ($q) use ($search) {
            return $q->where("name", "like", "%$search%");
        })->with('latlng')->orderBy('name');

        if ($isObj) {
            return response()->json($qry->paginate());
        }

        foreach ($qry->get() as $rows) {
            $html .= "<option value='$rows->code'>$rows->name</option>";
        }
        return $html;
    }


    public static function loadScript()
    {
        return <<<'blade'
        <script>
            $(function() {
                $("#prov_code").select2({
                    ajax: ajaxConfig('getProv'),
                    placeholder: 'Pilih Provinsi',
                });

                $("#kab_code").select2({
                    ajax: ajaxConfig('getKab', 'prov_code'),
                    placeholder: 'Pilih Kabupaten',
                });

                $("#kec_code").select2({
                    ajax: ajaxConfig('getKec', 'kab_code'),
                    placeholder: 'Pilih Kecamatan',
                });

                $("#kel_code").select2({
                    ajax: ajaxConfig('getKel', 'kec_code'),
                    placeholder: 'Pilih Desa/Kelurahan',
                });
            })


            function ajaxConfig(url, el = null) {
                return {
                    url: `/api/maps/${url}`,
                    dataType: 'json',
                    data: params => ({
                        isObj: true,
                        page: params.page,
                        search: params.term,
                        [el]: $(`#${el}`).val()
                    }),
                    processResults: (result, params) => {
                        console.log(result);
                        var datas = $.map(result.data, (obj) => {
                            obj.id = obj.code;
                            obj.text = obj.name;
                            return obj;
                        });


                        params.page = params.page || 1;
                        return {
                            results: datas,
                            pagination: {
                                more: (params.page * 10) < result.total
                            }
                        };
                    },
                    cache: true
                }
            }


            function loadKab() {
                $('#kab_code').html('<option value>Loading...</option>')
                $('#kec_code').html('<option value>Kecamatan</option>')
                $('#kel_code').html('<option value>Kelurahan</option>')
                $.get('/api/maps/getKab', {
                    prov_code: $('#prov_code').val()
                }, data => {
                    $('#kab_code').html(data)
                })
            }

            function loadKec() {
                $('#kec_code').html('<option value>Loading...</option>')
                $('#kel_code').html('<option value>Kelurahan</option>')
                $.get('/api/maps/getKec', {
                    kab_code: $('#kab_code').val()
                }, data => {
                    $('#kec_code').html(data)
                })
            }

            function loadKel() {
                $('#kel_code').html('<option value>Loading...</option>')
                $.get('/api/maps/getKel', {
                    kec_code: $('#kec_code').val()
                }, data => {
                    $('#kel_code').html(data)
                })
            }
        </script>
        blade;
    }


    public static function __loadScript()
    {
        return <<<'blade'
        <script>
            function loadKab() {
                $('#kab_code').html('<option value>Loading...</option>')
                $('#kec_code').html('<option value>Kecamatan</option>')
                $('#kel_code').html('<option value>Kelurahan</option>')
                $.get('/api/maps/getKab', {
                    prov_code: $('#prov_code').val()
                }, data => {
                    $('#kab_code').html(data)
                })
            }
            function loadKec() {
                $('#kec_code').html('<option value>Loading...</option>')
                $('#kel_code').html('<option value>Kelurahan</option>')
                $.get('/api/maps/getKec', {
                    kab_code: $('#kab_code').val()
                }, data => {
                    $('#kec_code').html(data)
                })
            }
            function loadKel() {
                $('#kel_code').html('<option value>Loading...</option>')
                $.get('/api/maps/getKel', {
                    kec_code: $('#kec_code').val()
                }, data => {
                    $('#kel_code').html(data)
                })
            }
        </script>
        blade;
    }
}
