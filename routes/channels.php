<?php
use App\Assessment;
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

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
Broadcast::channel('carrier-sent', function () {
      return true;
});

Broadcast::channel('approval-sent', function () {
      return true;
});

Broadcast::channel('payment-sent', function () {
      return true;
});

Broadcast::channel('approval', function () {
      return true;
});

