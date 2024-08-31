<?php

namespace Probytech\Promin;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Js;
use RuntimeException;

class Promin
{
    /**
     * Get the CSS for the Promin dashboard.
     *
     * @return Illuminate\Contracts\Support\Htmlable
     */
    public static function css()
    {
        if (($app = @file_get_contents(__DIR__.'/../dist/app.css')) === false) {
            throw new RuntimeException('Unable to load the Promin dashboard CSS.');
        }

        return new HtmlString(<<<HTML
            <style>{$app}</style>
            HTML);
    }

    /**
     * Get the JS for the Promin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Htmlable
     */
    public static function js()
    {
        if (($js = @file_get_contents(__DIR__.'/../dist/app.js')) === false) {
            throw new RuntimeException('Unable to load the Promin dashboard JavaScript.');
        }

        $promin = Js::from([
            'path'  => 'promin',
        ]);

        return new HtmlString(<<<HTML
            <script type="module">
                window.Promin = {$promin};
                {$js}
            </script>
            HTML);
    }
}