<?php

namespace Probytech\Promin\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $table = 'collections';

	protected $fillable = [
		'title',
		'table_name',
		'fields',
		'is_dev',
		'sort',
		'dropdown_id',
		'icon',
		'model'
	];

	protected $appends = ['model_namespace'];

	protected $casts = [
		'fields'	=> AsCollection::class,
	];

	protected function getModelNamespaceAttribute()
    {
		return '\App\Models\\'.$this->model;
    }
}
