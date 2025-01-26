<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    use HasUuids;
    protected $primaryKey = "uuid";
    public $incrementing = false;
    protected $keyType = 'string';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
