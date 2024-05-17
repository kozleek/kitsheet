<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Kit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckNewKits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kits:check-new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for new kits and notify the user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->toDateString();
        $newKits = DB::table('kits')->whereDate('created_at', $today)->get();

        if ($newKits->isEmpty()) {
            $this->info('No new kits created today.');
        } else {
            $this->info('New kits created today: ' . count($newKits));
            $this->info('Total kits: ' . Kit::count());
            $this->info('');
            foreach ($newKits as $kit) {
                $this->info("{$kit->id} ({$kit->created_at})");
            }
        }

        return Command::SUCCESS;
    }
}
