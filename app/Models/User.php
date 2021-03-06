<?php

namespace App\Models;

use App\Models\Profesi;
use App\Models\MasterCategory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles, QueryCacheable;

    protected static $flushCacheOnUpdate = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['verified'];

    /**
     * Get the Verified
     *
     * @param  string  $value
     * @return string
     */
    public function getVerifiedAttribute($value)
    {
        return $this->hasVerifiedEmail();
    }

    public function category()
    {
        return $this->belongsTo(MasterCategory::class, 'category_id')->withDefault([
            'name' => '',
        ]);
    }

    public function profesi()
    {
        return $this->belongsTo(Profesi::class)->withDefault([
            'name' => '',
        ]);
    }

    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            return $builder->where('email', '!=', 'masangga.com@gmail.com');
        });
    }

    public static function generateNo()
    {
        $kode = '';
        // $kode = $pref.date('my').doc_code();
        // $this->db->where('klinik', $klinik_id);
        // $this->db->like('trs_no', $kode);
        // $this->db->select_max('trs_no');
        // $qry = $this->db->get('tbl_transaksi');
        // if ($qry->num_rows() > 0) {
        // 	$max_no = (int) substr($qry->row()->trs_no, -4) + 1;
        // 	$trs_no = str_pad($max_no, 4, '0', STR_PAD_LEFT);
        // } else {
        // 	$trs_no = '0001';
        // }
        // return $kode . $trs_no;
    }
}
