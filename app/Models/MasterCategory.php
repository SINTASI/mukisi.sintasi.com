<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
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
        $html = '<option value="null">Pilih</option>';
        $qry = MasterCategory::where('type', 'anggota')->orderBy('name');
        foreach ($qry->get() as $cat) {
            $is_selected = $selected !== $cat->id ?: 'selected';
            $html .= "<option value='$cat->id' $is_selected>$cat->name </option>";
        }
        return $html;
    }
}
