<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    public static function loadHtml($selected = null)
    {
        $html = '<option value>Pilih Profesi</option>';
        $qry = self::where('active', true)->orderBy('name');
        foreach ($qry->get() as $cat) {
            $is_selected = $selected === $cat->id ? 'selected' : '';
            $html .= "<option value='$cat->id' $is_selected>$cat->name</option>";
        }
        // $html .= '<option value>Lainnya</option>';
        return $html;
    }
}
