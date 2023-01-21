<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the magic problem solvers commands:
    cache:clear,
    config:cache,
    config:clear,
    optimize';

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
     * @return void
     */
    public function handle(): void
    {
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('config:cache');
        $this->call('view:clear');
        $this->call('optimize');
        $this->call('route:clear');
        $this->info('Done!');
    }
}
