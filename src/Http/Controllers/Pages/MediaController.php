<?php

namespace Probytech\Promin\Http\Controllers\Pages;

use Inertia\Inertia;

class MediaController
{
	/**
	 * Media page for Promin.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show()
	{
		return Inertia::render('Media', []);
	}
}