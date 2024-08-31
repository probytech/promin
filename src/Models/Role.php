<?php

namespace Probytech\Promin\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public const COSTUMER = 1;
	public const SUPERADMIN = 2;
	public const ADMIN = 3;

	protected $table = 'roles';

	protected $fillable = [
		'title',
	];
}
