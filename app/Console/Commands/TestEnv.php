<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class TestEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->createUser();
    }

    public function createUser(){
        $user = User::create([
                'first_name' => 'khra',
                'last_name' => 'bghel',
                'username' => 'bghelkhra',
                'email' => 'khra@khra.ca',
                'password' => '123144452'

            ]);

        echo $user->username . ' this is my fucking name';
    }
}
