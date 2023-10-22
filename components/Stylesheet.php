<?php namespace Renick\Fonts\Components;

use Cms\Classes\ComponentBase;
use Renick\Fonts\Classes\FontStylesheet;

/**
 * Stylesheet Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Stylesheet extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'renick.fonts::lang.components.stylesheet.name',
            'description' => 'renick.fonts::lang.components.stylesheet.description'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function href()
    {
        return url("/storage/app/" . FontStylesheet::getDefaultPath());
    }
}
