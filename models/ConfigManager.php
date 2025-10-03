<?php

namespace configmanager;

interface IConfigurable
{
    function process(): bool;
    function getConfig(): array;
}

class ConfigManager implements IConfigurable
{

    private array $config = [
        'page' => './views/pages/other.page.php',
        // 'mode' => 'default',
    ];

    function getConfig(): array
    {
        return $this->config;
    }

    function process(): bool
    {

        echo "\nprocess";

        $requesturi = $_SERVER['REQUEST_URI'];

        $arr = explode('/', $requesturi);

        var_dump($requesturi, $arr[1]);

        require_once './models/settings/settings.main.php';

        foreach ($pages['home']['variates'] as $variate) {

            echo "\niteration";

            if (isset($arr[1]) && $arr[1] === $variate) {

                echo "\nvariate: $variate";
                if ($arr[1] === $variate) {

                    $this->config['page'] = $pages['home']['url'];
                    return true;
                }
            }

            $this->config['page'] = $pages['other']['url'];

            return true;
        }


        return true;
    }

    function __construct() {}
}
