<?php

namespace Modules\AutoPop\Loaders;

use Lightning\Tools\Request;
use Lightning\View\JS;

class AutoPop {

    /**
     * Initialize the AutoPop and load JS
     *
     * @param $settings
     */
    public static function init($settings) {
        // The display has already been shown, so it should not be shown again.
        if (Request::cookie('autoPop', Request::TYPE_BOOLEAN)) {
            return;
        }
        $settings = $settings + [
                'delay' => 30,
                'url' => '/delayed/optin',
                'norepeat' => true,
            ];

        JS::set('autoPop', $settings);
        JS::startup('lightning.modules.autoPop.init()', '/js/site.min.js');
    }
}
