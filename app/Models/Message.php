<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Message extends Model
{
    use HasFactory, HasUlids;

    // protected $fillable = ["id_user", "id_room", "text"];
    protected $guarded = ['id_message'];
    protected $primaryKey = 'id_message';
    public $incrementing = false;
    protected $keyType = 'string';

    public function room()
    {
        return $this->belongsTo(Room::class, "id_room");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id_user");
    }
}
