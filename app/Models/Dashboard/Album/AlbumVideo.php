<?php

namespace app\Models\Dashboard\Album;

use app\Traits\HandlesTranslationsAndMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumVideo extends Model
{

    use HasFactory,HandlesTranslationsAndMedia;
    //use softDeletes;

    protected $table = 'album_videos';

    protected $fillable = [
        'image',
        'alt_image',
        'video_url',
        'album_id',
        'status',
        'order'
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }

}
