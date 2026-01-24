<?php

namespace app\Models\Dashboard\Slider;

use app\Traits\HandlesTranslationsAndMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{

    use HasFactory;
    use SoftDeletes;
    use HandlesTranslationsAndMedia;

    protected $table = 'sliders';

    protected $fillable = [
        'title',
        'text',
        'link',
        'lang',
        'status',
        'image',
        'alt_image',
        'order'
    ];


}
