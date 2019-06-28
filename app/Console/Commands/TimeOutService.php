<?php

namespace App\Console\Commands;

use App\Booking;
use Illuminate\Console\Command;

class TimeOutService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timeout:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Time out services';

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
        $nexmo = app('Nexmo\Client');
        $query = Booking::where('date', '<', date('Y-m-d'))->where('status', '=', 'Pending');
        $datas = $query->get();
        $query->update(['status'=>'Time Out']);
        foreach ($datas as $data) {
            $nexmo->message()->send([
                'to' => '94775932985',
                'from' => $data->phone,
                'text' => 'You are Time out.'
            ]);
        }
    }
}
