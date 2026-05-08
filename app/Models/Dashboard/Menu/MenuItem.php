<?php

namespace app\Models\Dashboard\Menu;

use app\Models\Dashboard\Blog\Blog;
use app\Models\Dashboard\Blog\BlogCategory;
use app\Models\Dashboard\Page\Page;
use app\Traits\HandlesTranslationsAndMedia;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Translatable\HasTranslations;

class MenuItem extends Model
{
    use SoftDeletes;
    use HasTranslations;
    use HandlesTranslationsAndMedia;

    const MENUTPES = [
        'home' => 'home',
        'about-us' => 'about-us',
        'contact-us' => 'contact-us',
        'feed-back' => 'feed-back',
        'menu' => 'menu',
        'gallery' => 'gallery',
        'gallery-images' => 'gallery-images',
        'gallery-videos' => 'gallery-videos',
        'link' => 'link',


    ];

    protected $fillable = ['name', 'types', 'type_value_id', 'status', 'menu_id', 'parent_id', 'order', 'link'];

    protected $casts = [
        'name' => 'array',
    ];

    public $translatable = ['name']; // translatable attributes

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function subMenus()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->where('status','published')->orderBy('order', 'ASC');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'type_value_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'type_value_id');
    }

    public function blog_category()
    {
        return $this->belongsTo(BlogCategory::class, 'type_value_id');
    }

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('head_menu');
        });

        static::deleting(function ($menuItem) {
            Cache::forget('head_menu');
        });
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('order', 'asc');
        });
    }

    public function getCustomLinkAttribute()
    {
        switch ($this->types) {
            case 'home':
                return route('website.home');
            case 'about-us':
                return route('website.about_us');
            case 'contact-us':
                return LaravelLocalization::localizeUrl('/contact-us');
            case 'link':
                return LaravelLocalization::localizeUrl($this->link);
            case 'gallery-images':
                return LaravelLocalization::localizeUrl('gallery-images');
            case 'gallery-videos':
                return LaravelLocalization::localizeUrl('gallery-videos');
            case 'menu':
                return LaravelLocalization::localizeUrl('menu');
            case 'feed-back':
                return LaravelLocalization::localizeUrl('feed-back');
            case 'gallery':
                return 'javascript:void(0)';
            case 'main-menu':
                return 'javascript:void(0)';
        }
    }

    public function getCustomNameAttribute()
    {
        switch ($this->types) {
            case 'home':
                return __('home.home');
            case 'about-us':
                return __('home.about_us');
            case 'contact-us':
                return __('home.contact_us');
            default:
                return $this->name;
        }
    }
    public function getIsActiveAttribute()
    {
        $currentUrl = urldecode(Request::url());
        $link = urldecode($this->custom_link);

        // Always active if exact match
        if ($currentUrl === $link) {
            return true;
        }
        $type = $this->types;
        switch ($type) {
            case 'home':
                return Request::is('/');
            case 'about-us':
                return Request::is('about-us');
            case 'contact-us':
                return Request::is('contact-us');
            case 'gallery-images':
                return Request::is('gallery-images') || Request::segment(2) == 'gallery-images';
            case 'gallery-videos':
                return Request::is('gallery-videos') || Request::segment(2) == 'gallery-videos';
            case 'menu':
                return Request::is('menu') || Request::segment(2) == 'menu';
            case 'feed-back':
                return Request::is('feed-back') || Request::segment(2) == 'feed-back';
            case 'main-menu':
                if ($this->subMenus->count() > 0) {
                    foreach ($this->subMenus as $subMenu) {
                        if ($subMenu->is_active) {
                            return true;
                        }
                    }
                }
            default:
                // fallback: exact URL match
                return $currentUrl === $link;
        }
    }
}
