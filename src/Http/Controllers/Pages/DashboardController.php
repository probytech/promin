<?php

namespace Probytech\Promin\Http\Controllers\Pages;

use Inertia\Inertia;

class DashboardController
{
    /**
     * Dashboard page for Promin.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        return Inertia::render('Dashboard', []);
    }
}