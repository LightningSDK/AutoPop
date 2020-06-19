<?php

namespace lightningsdk\autopop\Loaders;

use lightningsdk\core\Tools\Configuration;
use lightningsdk\core\Tools\Request;
use lightningsdk\core\View\JS;

class AutoPop {

    /**
     * Initialize the AutoPop and load JS
     */
    public static function init() {
        // The display has already been shown, so it should not be shown again.
        if (Request::cookie('autoPop', Request::TYPE_BOOLEAN)) {
            return;
        }

        // Check if the url is excluded
        $settings = Configuration::get('modules.autopop');
        $path = Request::getLocation();
        if (!empty($settings['exclude'])) {
            foreach ($settings['exclude'] as $exclusion) {
                if (preg_match('|'.$exclusion.'|', $path)) {
                    // This page is excluded, just return
                    return;
                }
            }
        }

        JS::set('autopop', $settings['popup']);
        JS::startup('lightning.modules.autoPop.init()', '/js/site.min.js');
    }
}
