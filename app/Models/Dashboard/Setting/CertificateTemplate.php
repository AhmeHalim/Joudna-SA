<?php

namespace app\Models\Dashboard\Setting;

use app\Traits\HandlesTranslationsAndMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CertificateTemplate extends Model
{
    use HasTranslations;
    use HandlesTranslationsAndMedia;

    const TYPES = [
        'certificate' => 'certificate',
        'statement' => 'statement'
    ];
    protected $fillable = ['name', 'image_path', 'fields','status','type'];

    protected $casts = [
        'name'=> 'array',
        'fields' => 'array',
    ];

    public $translatable = ['name'];

}
