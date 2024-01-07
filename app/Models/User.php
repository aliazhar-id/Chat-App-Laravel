<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, HasUlids;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  // protected $fillable = [
  //     'name',
  //     'email',
  //     'password',
  // ];

  protected $guarded = ['id_user'];
  protected $primaryKey = 'id_user';
  protected $keyType = 'string';
  public $incrementing = false;

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  // public function getRouteKeyName()
  // {
  //   return 'username';
  // }

  public function canJoinRoom($id_room)
  {
    $granted = false;
    $room = Room::findOrFail($id_room);
    $users = explode(':', $room->users);

    foreach ($users as $id) {
      if ($this->id_user == $id) {
        $granted = true;
      }
    }

    return $granted;
  }
}
