<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UpdateServiceStateOnProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:serviceStateProject';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to update service state project if became billable';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = new \App\Http\Controllers\ProjectController();
        $controller->updateServiceState();
        echo $controller->updateServiceState();
    }
}
