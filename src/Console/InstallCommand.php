<?php

namespace Probytech\Promin\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Probytech\Promin\Models\Role;
use Artisan;

class InstallCommand extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'promin:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run installation of Promin.';

	/**
	 * Create a new command instance.
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 */
	public function handle() {

        $this->info('Running migrations.');

		Artisan::call('migrate');

        $this->info('Migrated successfully.');
		
		$this->createSuperAdmin();
	}

    /**
	 * Create super admin with role
     * TODO: Make role_id fillable and use User model
	 */
	private function createSuperAdmin()
    {
		DB::table('users')
        ->insert([
			'name'		=> $this->ask('Administrator name'),
			'email'		=> $this->ask('Administrator email'),
			'password'	=> Hash::make($this->secret('Administrator password')),
			'role_id'	=> Role::SUPERADMIN,
		]);
	}
}