<?php

namespace app\Models\Dashboard\Item;

use App\Models\Dashboard\Category\Category;
use app\Traits\HandlesTranslationsAndMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Translatable\HasTranslations;

class Item extends Model
{
    use HasFactory, HasTranslations, HandlesTranslationsAndMedia, SoftDeletes;

    protected $guarded = [];
    public $translatable = ['name', 'short_desc', 'long_desc', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)
            ->orWhere('slug->en', $value)
            ->orWhere('slug->ar', $value)
            ->firstOrFail();
    }
}
