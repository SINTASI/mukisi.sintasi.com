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
 * App\Models\Blog
 *
 * @property int $id
 * @property string $blog
 * @property \Illuminate\Support\Carbon|null $publish_after
 * @property string $slug
 * @property string $title
 * @property string|null $author_name
 * @property string|null $author_email
 * @property string|null $author_url
 * @property string|null $image
 * @property string $content
 * @property string|null $summary
 * @property string|null $page_title
 * @property string|null $description
 * @property array|null $meta_tags
 * @property int|null $display_full_content_in_feed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $json_meta_tags
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractBlogEntry blog($blog_id)
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractBlogEntry latestPublication()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractBlogEntry oldestPublication()
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractBlogEntry publishedAfterEntry(\Bjuppa\LaravelBlog\Eloquent\AbstractBlogEntry $entry)
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractBlogEntry publishedBeforeEntry(\Bjuppa\LaravelBlog\Eloquent\AbstractBlogEntry $entry)
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractBlogEntry publishedRelativeEntry(\Bjuppa\LaravelBlog\Eloquent\AbstractBlogEntry $entry, string $operator = '>')
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractBlogEntry slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAuthorEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAuthorUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDisplayFullContentInFeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog wherePageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog wherePublishAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
	class Blog extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
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
 * @property string|null $type
 * @property int|null $category_id
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoAnggota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

