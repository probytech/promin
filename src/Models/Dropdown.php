<?php

namespace Probytech\Promin\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
	protected $table = 'dropdowns';

	protected $fillable = [
		'title',
		'sort',
		'icon',
	];
}
