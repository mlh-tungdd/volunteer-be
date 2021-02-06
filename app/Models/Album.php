<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'category_album_id',
    ];

    /**
     * Relationship
     */
    public function categoryAlbum()
    {
        return $this->belongsTo(CategoryAlbum::class, 'category_album_id');
    }

    /**
     * response
     *
     */
    public function getAlbumResponse()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'category_album_id' => $this->category_album_id,
            'category_name' => $this->categoryAlbum->title ?? null,
        ];
    }
}
