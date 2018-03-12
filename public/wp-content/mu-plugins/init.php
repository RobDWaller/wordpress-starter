<?php

$respository = Config\Config::getInstance();

foreach ($respository->get('mu-plugins') as $plugin){
    require_once __DIR__ . '/' . $plugin;
}
