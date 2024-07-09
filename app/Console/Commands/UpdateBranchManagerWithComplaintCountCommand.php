<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateBranchManagerWithComplaintCountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:manager-complaint-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Implement sending email here
    }
}
