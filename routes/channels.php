<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{user}', function (User $user, $id_room) {
    return (string) $user->id_user === (string) $id_room;
});

Broadcast::channel('chat.{id_room}', function (User $user, $id_room) {
    if ($user->canJoinRoom($id_room)) {
        return ['id_user' => $user->id_user, 'name' => $user->name];
    }
});
