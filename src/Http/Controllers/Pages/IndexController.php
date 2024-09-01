<?php

namespace Probytech\Promin\Http\Controllers\Pages;

use Inertia\Inertia;
use Probytech\Promin\Models\Collection;

class IndexController
{
	/**
	 * Show instances of collection.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Collection $collection)
	{
		$columns = [
			[
				'title'	=> 'id',
				'key'	=> 'id',
			],
		];

		foreach ($collection->fields->where('is_show_in_list', true) as $field) {

			$columns[] = [
				'title'	=> $field['title'],
				'key'	=> $field['db_title'],
			];
		}

		$model = (new $collection->model_namespace());

		$items = $model->select(array_column($columns, 'key'))
			->paginate(1);

		return Inertia::render('Index', [
			'collection' 	=> $collection,
			'items'			=> $items,
			'columns'		=> $columns,
		]);
	}
}
