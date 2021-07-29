<?php

namespace App\Models;

use App\Models\FormLine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the subs for the blog post.
     */
    public function subs()
    {
        return $this->hasMany(FormLine::class);
    }
}
