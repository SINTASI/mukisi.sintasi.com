<?php

namespace App\Models\Admin;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuAdmin extends Model
{
    use HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public static function mainMenu()
    {
        return self::where('parent', 0)
            ->orderBy('seq_no')
            ->get()->each(function ($rows) {
                $rows->child = self::where('parent', $rows->id)->orderBy('seq_no')->get()->each(function ($rows) {
                    $rows->child2 = self::where('parent', $rows->id)->orderBy('seq_no')->get();
                });
            });
    }
}
