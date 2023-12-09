<?php

use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('message/sent', function (Request $request) {
  $message = $request->input('message');
  MessageSent::dispatch(auth()->user(), $message);
}); 