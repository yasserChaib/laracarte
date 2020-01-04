<?php

namespace App\Console\Commands;

use App\Model\Message;
use Illuminate\Console\Command;

class CleanDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Laracarte:clean-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean DataBase';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Cleaning DataBase.....');
        // Message::where('created_at','<=', Carbon::parse('2 months ago'))->delete();
        Message::twoMonthsOld()->delete();
        $this->info('clean dataBase');
    }
}
