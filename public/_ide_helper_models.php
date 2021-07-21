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
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
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
	class Slider extends \Eloquent {}
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
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoAnggota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

