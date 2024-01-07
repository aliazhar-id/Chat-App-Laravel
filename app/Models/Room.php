<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Room extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = ["id_room"];
    protected $primaryKey = 'id_room';
    protected $keyType = 'string';
    public $incrementing = false;
}
