<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Admin{
/**
 * App\Models\Admin\MenuAdmin
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 * @property string|null $icon
 * @property string|null $color
 * @property int|null $parent
 * @property int|null $seq_no
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereSeqNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuAdmin whereUpdatedAt($value)
 */
	class MenuAdmin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Form
 *
 * @property int $id
 * @property string $key
 * @property string $label
 * @property string|null $data
 * @property string $icon
 * @property string $type
 * @property int $required
 * @property string|null $placeholder
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FormLine[] $subs
 * @property-read int|null $subs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Form newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form query()
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form wherePlaceholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereUpdatedAt($value)
 */
	class Form extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FormLine
 *
 * @property int $id
 * @property string $key
 * @property string $label
 * @property string|null $data
 * @property string $icon
 * @property string $type
 * @property int $required
 * @property string|null $placeholder
 * @property int $form_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Form $form
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine wherePlaceholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormLine whereUpdatedAt($value)
 */
	class FormLine extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Map
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property-read \App\Models\MapsLine|null $latlng
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user_prov
 * @property-read int|null $user_prov_count
 * @method static \Illuminate\Database\Eloquent\Builder|Map newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Map newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Map query()
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereName($value)
 */
	class Map extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MapsLine
 *
 * @property int $id
 * @property string|null $map_code
 * @property string|null $name
 * @property string|null $ibukota
 * @property float|null $lat latitude in degrees
 * @property float|null $lng longitude in degrees
 * @property float $elv elevation in meters
 * @property int|null $tz timezone in hour
 * @property string|null $path boundaries/polygon area
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereElv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereIbukota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereMapCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsLine whereTz($value)
 */
	class MapsLine extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MasterCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $refs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory whereRefs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterCategory whereUpdatedAt($value)
 */
	class MasterCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MenuUser
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $color
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuUser whereUpdatedAt($value)
 */
	class MenuUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profesi
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profesi whereUpdatedAt($value)
 */
	class Profesi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property string|null $label
 * @property string|null $type
 * @property int|null $is_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $images
 * @property string|null $class
 * @property int|null $height
 * @property int|null $seq_no
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereSeqNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $username
 * @property string|null $no_anggota
 * @property string|null $institusi_name
 * @property string|null $type
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $rs_type A, B, D, C
 * @property string|null $akreditasi Dasar, Madya, Utama, Paripurna
 * @property string|null $klinik Klinik Utama, Klinik Pratama
 * @property string|null $lab Madya, Pratama, utama
 * @property string|null $pendidikan SMK Kesehatan, AKADEMI/STIKES, Universitas
 * @property string|null $no_tlp_rs
 * @property string|null $no_tlp
 * @property string|null $no_pic
 * @property string|null $no_wa
 * @property string|null $img_rs
 * @property string|null $img_ktp
 * @property string|null $kehalian_khusus
 * @property string|null $alamat
 * @property string|null $prov_code
 * @property string|null $kab_code
 * @property string|null $kec_code
 * @property string|null $kel_code
 * @property int|null $profesi_id
 * @property-read \App\Models\MasterCategory|null $category
 * @property-read string $verified
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Profesi|null $profesi
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAkreditasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImgKtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImgRs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInstitusiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKabCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKecCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKehalianKhusus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKelCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoAnggota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoTlp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoTlpRs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfesiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

