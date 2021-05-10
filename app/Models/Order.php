<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'note',
        'thumbnail',
        'donation_id',
        'user_id',
    ];

    /**
     * response
     *
     */
    public function getOrderResponse()
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'note' => $this->note,
            'thumbnail' => $this->thumbnail,
            'created_at' => $this->created_at,
            'donation_id' => $this->donation_id,
            'user_id' => $this->user_id,
        ];
    }
}
