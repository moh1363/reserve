<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Models\Reservation;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Log;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reserves:statusUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'status update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $reservations=Reservation::where('status','1')->get();
        foreach ($reservations as $reserve){
            $e=$reserve->expire_date;
            $expiredate=Verta::parse($reserve->issue_date);
            $d= Verta::now()->subDay($e);
            $f=$expiredate->diffDays($d);
            if($f >= $e){
                Reservation::where('id',$reserve->id)->update([
                    'status'=>0
                ]);
            }
                 }

    }
}
