<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MailSent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test to mail million data';

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

    }
}
