<?php

namespace app\Models\Dashboard\Album;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumImage extends Model
{

    use HasFactory;
    //use softDeletes;

    protected $table = 'album_images';

    protected $fillable = [
        'image',
        'alt_image',
        'album_id',
        'status'
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }

}
