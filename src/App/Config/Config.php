<?php

namespace App\Config;

use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

class Config
{
    protected $fileSystem;

    private static $instance;
    private static $repository;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new Config(new Filesystem);
        }

        return static::$repository;
    }

    protected function __construct(Filesystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
        static::$repository = $this->make();
    }

    public function make()
    {
        $configFileArrays = $this->getConfigFileArrays();
        return new Repository($configFileArrays);
    }

    private function getConfigFileArrays()
    {
        $files = $this->fileSystem->files(__DIR__);
        return count($files) > 0 ? $this->getArraysFromFiles($files) : [] ;
    }

    private function getArraysFromFiles(array $files)
    {
        $result = [];
        foreach ($files as $file) {
            if (!strpos($file, 'Config.php')) {
                $result[$this->fileSystem->name($file)] = require_once $file;
            }
        }

        return $result;
    }
}
