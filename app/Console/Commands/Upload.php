<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Upload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update ott data';

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
        exec('ssh -i "~/.ssh/vpn-2021-0510.pem" ubuntu@ec2-18-179-152-120.ap-northeast-1.compute.amazonaws.com rm -rf /var/www/html/mhrise/*');

        exec('scp -i "~/.ssh/vpn-2021-0510.pem" -r /Volumes/html/dodomogu/mhrise/build/* ubuntu@ec2-18-179-152-120.ap-northeast-1.compute.amazonaws.com:/var/www/html/mhrise');

        echo "finish\n";exit;
    }
}
