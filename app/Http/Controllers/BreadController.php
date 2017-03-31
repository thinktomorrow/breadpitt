<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreadController extends Controller
{
    private static $bestemming = "";
    private static $benvoliosmenu = "http://www.benvolios.be/";
    private static $link21menu = "http://link21.groepvaneyck.be/assets/Link21/Brasseriekaart-2016-najaar.pdf";

    public function getMenu($bot){
        //$bot->reply('Halloo daar')
        if(self::$bestemming == ""){
            $bot->reply('Waar wil je bestellen?');
        }else{
            self::$bestemming == "benvolios" ? $bot->reply('Het menu voor '.self::$bestemming. ': '. self::$benvoliosmenu) : '';
            self::$bestemming == "link21" ? $bot->reply('Het menu voor '.self::$bestemming. ': '. self::$link21menu) : '';
        }
    }

    public function getRestaurant($bot, $bestemming){
        switch($bestemming){
            case "benvolios":
                self::$bestemming = "benvolios";
                $bot->reply('Ah bij benvolios. Dat is goed. Hier is het menu: ');
                break;
            case "link21":
                self::$bestemming = "link21";
                $bot->reply('Bij link21? Fantastisch, hier is het menu: ');
                break;
        }
    }
}
