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
        $qry = self::where('code', 'like', "$prov_code%")->whereRaw("LENGTH(code) = 5");
        return self::mapResponse($qry, $isObj, 'Kabupaten/Kota');
    }


    public static function loadKec(string $kab_code, $isObj = false)
    {
        $qry = self::where('code', 'like', "$kab_code%")->whereRaw("LENGTH(code) = 8");
        return self::mapResponse($qry, $isObj, 'Kecamatan');
    }


    public static function loadKel(string $kec_code, $isObj = false)
    {
        $qry = self::where('code', 'like', "$kec_code%")->whereRaw("LENGTH(code) = 13");
        return self::mapResponse($qry, $isObj, 'Kelurahan');
    }

    public static function mapResponse($qry, $isObj, $label = "")
    {
        $html = "<option value>$label</option>";
        $data = $qry->with('latlng')->orderBy('name');
        if ($isObj) {
            return $data->get();
        }
        foreach ($data->get() as $rows) {
            $html .= "<option value='$rows->code'>$rows->name</option>";
        }
        return $html;
    }


    public static function loadScript()
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
