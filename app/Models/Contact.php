<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content',
        'email',
        'phone',
        'fullname',
    ];

    /**
     * Relationship
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * response
     *
     */
    public function getContactResponse()
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'email' => $this->email,
            'phone' => $this->phone,
            'fullname' => $this->fullname,
            'user_name' => $this->users->fullname ?? null,
        ];
    }
}
