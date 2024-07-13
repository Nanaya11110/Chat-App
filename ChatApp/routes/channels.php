<?php

use App\Models\conversation;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('user.{id}', function ($userId, $id) {
   return (int) $userId=== (int) $id;
   //return 'true';
});

Broadcast::channel('test.{id}', function()
{
    return 'true';
});

