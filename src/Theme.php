<?php
namespace Fluent;

class Theme
{
    public static function factory($theme, $content)
    {
        switch ($theme) {
            case 'musimal':
                return new Theme\Musimal($content);
                break;
            default: 
                throw new \Exception("Unknown theme: '{$theme}'");
                break;
        }
    }
}
