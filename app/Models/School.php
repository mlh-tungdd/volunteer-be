<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools';

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
        'address',
        'views',
        'district_id',
    ];

    /**
     * Relationship
     */
    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    /**
     * response
     *
     */
    public function getSchoolResponse()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'address' => $this->address,
            'views' => $this->views,
            'district_id' => $this->district_id,
            'created_at' => $this->created_at,
            'district_name' => $this->districts->title ?? null,
        ];
    }
}
