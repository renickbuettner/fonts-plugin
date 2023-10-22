<?php namespace Renick\Fonts;

use Renick\Fonts\Classes\FontImport;
use Renick\Fonts\Classes\FontStylesheet;
use System\Classes\CombineAssets;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'renick.fonts::lang.plugin.name',
            'description' => 'renick.fonts::lang.plugin.description',
            'author' => 'Renick Büttner',
            'icon' => 'icon-font'
        ];
    }

    public function register()
    {
        \System\Controllers\Settings::extend(function($controller) {
            $controller->addDynamicMethod('onFontImport', function() use ($controller) {
                (new FontImport())->onFontImport($controller);
            });
        });
    }

    public function registerSettings(): array
    {
        return [
            'settings' => [
                'label' => 'renick.fonts::lang.plugin.name',
                'description' => 'renick.fonts::lang.plugin.description',
                'category' => 'CATEGORY_CMS',
                'icon' => 'icon-font',
                'class' => \Renick\Fonts\Models\FontsSettings::class,
                'keywords' => 'fonts',
                'permissions' => ['renick.fonts.permissions.fonts_manage']
            ]
        ];
    }

    public function registerPermissions(): array
    {
        return [
            'renick.fonts.permissions.fonts_manage' => [
                'tab' => 'renick.matomo::lang.permissions.tab',
                'label' => 'renick.fonts.permissions.fonts_manage',
                'roles' => ['developer'],
            ],
        ];
    }

    public function registerComponents()
    {
        return [
            'Renick\Fonts\Components\Stylesheet' => 'fontsStylesheet',
        ];
    }
}
