<?php

namespace app\Models\Dashboard\Category;

use app\Traits\HandlesTranslationsAndMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, HandlesTranslationsAndMedia, SoftDeletes;

    protected $guarded = [];
    public $translatable = ['name', 'slug'];

    public function items()
    {
        return $this->hasMany(\App\Models\Dashboard\Item\Item::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)
            ->orWhere('slug->en', $value)
            ->orWhere('slug->ar', $value)
            ->firstOrFail();
    }
}
