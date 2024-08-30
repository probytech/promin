<?php

namespace Probytech\Promin\Controllers;

use Illuminate\Http\Request;

class ProminController
{
    public function __invoke(Request $request)
    {
        return view('promin::index', [
            'quote' => 'test',
        ]);
    }
}