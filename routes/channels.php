<?php

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

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('tasks', function () {
//     return true;
// });

Broadcast::channel('tasks', function ($user) {
    return [
    	'id' => $user->id
    ];
});

Broadcast::channel('user.{toUserId}', function($user,$toUserId){
	//return $user->user_id == $toUserId;
	return true;
});
