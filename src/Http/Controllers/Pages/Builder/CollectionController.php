<?php

namespace Probytech\Promin\Http\Controllers\Pages\Builder;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Probytech\Promin\Models\Collection;

class CollectionController
{
	/**
	 * Index collections page.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		$collections = Collection::paginate(10);

		return Inertia::render('builder/Collections', [
			'collections'	=> $collections,
		]);
	}

	/**
	 * Create collection page.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create(Request $request)
	{
		return Inertia::render('builder/CollectionCreate', []);
	}

	/**
	 * Show edit collection.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(Collection $collection)
	{
		return Inertia::render('builder/CollectionEdit', [
			'collection' 	=> $collection,
		]);
	}
}
