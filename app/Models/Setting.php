<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'content',
        'favicon',
        'logo',
        'address',
        'hotline',
        'email',
    ];

    /**
     * response
     *
     */
    public function getSettingResponse()
    {
        return [
            'email' => $this->email,
            'hotline' => $this->hotline,
            'address' => $this->address,
            'logo' => $this->logo,
            'content' => $this->content,
            'description' => $this->description,
        ];
    }
}
