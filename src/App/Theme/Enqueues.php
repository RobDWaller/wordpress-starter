<?php
namespace Theme\Bootstrap;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Enqueue Javascript and CSS
 */
class Enqueues
{
    private $buildPath;
    private $manifestContent;
    private $codeSplit;

    public function __construct()
    {
        $this->manifestContent = json_decode(file_get_contents('../public/mix-manifest.json'), true);
        $this->buildPath = '/wp-content/themes/project-theme/assets/build/';

        $this->detectJsCodeSplit();
        $this->enqueueScripts();
        $this->enqueueStyles();
    }

    private function getFileName($assetType='')
    {
        switch ($assetType) {
            case 'js':
                return str_replace($this->buildPath, '', $this->manifestContent[$this->buildPath . 'app.js']);

            case 'css':
                return str_replace($this->buildPath, '', $this->manifestContent[$this->buildPath . 'style.css']);
        }
    }

    private function detectJsCodeSplit()
    {
        $vendorKey = $this->buildPath . 'vendor.js';
        $manifestKey = $this->buildPath . 'manifest.js';

        if (array_key_exists($vendorKey, $this->manifestContent)) {
            $this->codeSplit = [
                'vendor' => str_replace($this->buildPath, '', $this->manifestContent[$vendorKey]),
                'manifest' => str_replace($this->buildPath, '', $this->manifestContent[$manifestKey])
            ];
        }
    }

    private function enqueueStyles()
    {
        $this->wpEnqueueStyle('theme_css', get_template_directory_uri() . '/assets/build/' . $this->getFileName('css'));
    }

    private function enqueueScripts()
    {
        // Hot Reloading is enabled and we are in development mode then load the JS from Webpack Dev Server
        $webpackHotReload = getenv('DEV_HOT_RELOADING') === 'true' && getenv('ENVIRONMENT') !== 'production';
        $themeBuildFolder = get_template_directory_uri() . '/assets/build/';

        // If code splitting is enabled then split the vendor code to a seprate file along with webpack manifest
        if ($this->codeSplit) {
            wp_enqueue_script('manifest', $this->buildPath . $this->codeSplit['manifest'], array(), '', true);
            wp_enqueue_script('vendor', $this->buildPath . $this->codeSplit['vendor'], array(), '', true);
        }

        // App.js - main javascript file
        if ($webpackHotReload) {
            $webpackDevServerPath = 'http://localhost:8080/wp-content/themes/project-theme/assets/build/';
            wp_enqueue_script('app', $webpackDevServerPath . $this->getFileName('js'), array(), '', true);
        } else {
            wp_enqueue_script('app', $themeBuildFolder . $this->getFileName('js'), array(), '', true);
        }
    }
}
