<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAlbum extends Model
{
    use HasFactory;

    protected $table = 'categories_album';

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * response
     *
     */
    public function getCategoryAlbumResponse()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
