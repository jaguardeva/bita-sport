<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    use HasUuids;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class, 'field_uuid', 'uuid');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'field_uuid', 'uuid');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_uuid', 'uuid');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'field_facility');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'field_uuid', 'uuid');
    }
}
