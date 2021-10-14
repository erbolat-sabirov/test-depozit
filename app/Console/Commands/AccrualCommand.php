<?php

namespace App\Console\Commands;

use App\Services\Crud\DepozitCrudService;
use Illuminate\Console\Command;

class AccrualCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accrue:money';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $depozitService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DepozitCrudService $depozitService)
    {
        parent::__construct();

        $this->depozitService = $depozitService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->depozitService->accrueDepozits();
        return Command::SUCCESS;
    }
}
