<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;

class ClearActivityLogWeekly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-activity-log {days=7}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus activity log yang lebih dari X hari (default 7 hari)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $days = $this->argument('days');
            $deleted = Activity::where('created_at', '<', Carbon::now()->subDays($days))->delete();

            $this->info("Berhasil menghapus {$deleted} log aktivitas yang berusia {$days} hari.");
            return Command::SUCCESS;
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return Command::FAILURE;
        }
    }
}
