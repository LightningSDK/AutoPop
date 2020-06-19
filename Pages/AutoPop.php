<?php

namespace lightningsdk\autopop\Pages;

use lightningsdk\core\Tools\Template;
use lightningsdk\core\View\Page;
use lightningsdk\core\View\Widget;

/**
 * Class AutoPop
 * @package lightningsdk\autopop\Pages
 *
 * This loads the modal page for the popup
 */
class AutoPop extends Page {

    protected $template = ['optin-modal', 'lightningsdk/autopop'];

    public function hasAccess() {
        return true;
    }

    public function get() {
        $settings = \lightningsdk\core\Tools\Configuration::get('modules.autopop.popup');
        if (empty($settings)) {
            throw new \Exception('Not found');
        }

        $template = Template::getInstance();
        $template->set('autopop', $settings);
    }
}
