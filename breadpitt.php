<?php
require 'vendor/autoload.php';

use Mpociot\BotMan\BotManFactory;
use React\EventLoop\Factory;

// Init that sexy bastard
$loop = Factory::create();
$botman = BotManFactory::createForRTM([
    'slack_token' => 'xoxb-155224779985-OqYGPzMD2tnecj5lojB368Gc'
], $loop);

// listen to keywords
$botman->hears('keyword', function($bot) {
    $bot->reply('I heard you! :)');
});

$botman->hears('mijn naam is {name}', function($bot, $name){
    $bot->userStorage()->save([
        'name' => $name
    ]);
    $bot->reply('Hallo '. $name);
});

$botman->hears('wat is mijn naam', function($bot){
    $user = $bot->userStorage()->get();
    $user->has('name') ? $bot->reply('Uw naam is '.$user->get('name')) : $bot->reply('Ik ken u nog niet.');
});

$botman->hears('vergeet mij', function($bot){
    $bot->userStorage()->delete();
});

// Regular expressions
$botman->hears(preg_match('/menu|bestellen|bestelling|order/ig'), 'App\Http\Controllers\BreadController@getMenu');
//$botman->hears(preg_match('/bestellen|bestelling|order/ig'), 'App\Http\Controllers\BreadController@askRestaurant');

// $botman->hears('ik wil bestellen bij {bestemming}', 'App\Http\Controllers\BreadController@getRestaurant');

// Start listening to our mighty commands
$loop->run();
