<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';

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
        'status',
        'tags',
        'user_id',
    ];

    /**
     * Relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * response
     *
     */
    public function getDonationResponse()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'status' => $this->status,
            'tags' => $this->tags,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'user' => $this->user ?? null,
        ];
    }
}
