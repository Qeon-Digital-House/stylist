<?php
namespace FloatingPoint\Stylist;

use Cache;
use Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class StylistServiceProvider extends ServiceProvider
{
    /**
     * Registers the various bindings required by other packages.
     */
    public function register()
    {
        $this->registerAlias();
        $this->registerStylist();
        $this->setupUrlGenerator();
    }

    /**
     * Sets up the object that will be used for theme registration calls.
     */
    private function registerStylist()
    {
        $this->app->singleton('stylist', 'FloatingPoint\Stylist\Theme\Stylist');
    }

    /**
     * Stylist class should be accessible from global scope for ease of use.
     */
    private function registerAlias()
    {
        AliasLoader::getInstance()->alias('Stylist', 'FloatingPoint\Stylist\Facades\Stylist');
    }

    private function setupUrlGenerator()
    {
        AliasLoader::getInstance()->alias('Illuminate\Routing\UrlGenerator', 'FloatingPoint\Stylist\Theme\UrlGenerator');
    }

    /**
     * An array of classes that Stylist provides.
     *
     * @return array
     */
    public function provides()
    {
        return ['Stylist'];
    }
}
