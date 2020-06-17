<?php

namespace lightningsdk\autopop\Pages;

use lightningsdk\core\Tools\Template;
use lightningsdk\core\View\Page;
use lightningsdk\core\View\Widget;

class AutoPop extends Page {

    protected $template = ['optin-modal', 'lightningsdk/autopop'];

    public function hasAccess() {
        return true;
    }

    public function get() {
        $settings = \lightningsdk\core\Tools\Configuration::get('autoPop');
        if (empty($settings)) {
            throw new \Exception('Not found');
        }

        $template = Template::getInstance();
        $template->set('autopop', $settings);
    }
}
