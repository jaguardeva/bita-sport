<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasUuids;

    protected $primaryKey = "uuid";
    public $incrementing = false;
    protected $keyType = 'string';


    public function fields()
    {
        return $this->hasMany(Field::class, 'category_uuid', 'uuid');
    }
}
