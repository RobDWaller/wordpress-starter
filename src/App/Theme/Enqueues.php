<?php
namespace App\Theme;

use App\WordPress\WordPress;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Enqueue Javascript and CSS
 */
class Enqueues
{
    use WordPress;

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
        $this->wpEnqueueStyle('theme_css', $this->getTemplateDirectoryUri() . '/assets/build/' . $this->getFileName('css'));
    }

    /**
     * @todo the hot reload stuff is deeply flawed.
     */
    private function enqueueScripts()
    {
        // Hot Reloading is enabled and we are in development mode then load the JS from Webpack Dev Server
        $webpackHotReload = getenv('DEV_HOT_RELOADING') === 'true' && getenv('ENVIRONMENT') !== 'production';
        $themeBuildFolder = $this->getTemplateDirectoryUri() . '/assets/build/';

        // If code splitting is enabled then split the vendor code to a seprate file along with webpack manifest
        if ($this->codeSplit) {
            $this->wpEnqueueScript('manifest', $this->buildPath . $this->codeSplit['manifest'], array(), '', true);
            $this->wpEnqueueScript('vendor', $this->buildPath . $this->codeSplit['vendor'], array(), '', true);
        }

        // App.js - main javascript file
        if ($webpackHotReload) {
            $webpackDevServerPath = 'http://localhost:8080/wp-content/themes/project-theme/assets/build/';
            $this->wpEnqueueScript('app', $webpackDevServerPath . $this->getFileName('js'), array(), '', true);
        } else {
            $this->wpEnqueueScript('app', $themeBuildFolder . $this->getFileName('js'), array(), '', true);
        }
    }
}
