<?php

namespace daemon;

class Router
{

    public static function process(string $route): string
    {


        $arr = explode('/',  $route);

        switch ($arr[1]) {
            case 'foo':
                return 'upload-form.php';
                break;
            case 'bar':
                return 'home.php';
                break;
            case 'download':
                return 'download-video-view/index.php';
                break;
            case 'admin':

                // require_once './controllers/MediaController.php';

                // new MediaController()->upload();

                return 'home.php';
                break;
            default:
                return 'home.php';
                // Header('Location: /home');
                break;
        }

        return '';
    }


    public function __construct() {}
}
