<?php

namespace lightningsdk\autopop\Loaders;

use lightningsdk\core\Tools\Request;
use lightningsdk\core\View\JS;

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
