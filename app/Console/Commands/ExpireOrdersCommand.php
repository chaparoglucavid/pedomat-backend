<?php

namespace App\Console\Commands;

use App\Models\OrderDetails;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExpireOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:expire-barcodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'İstifadə müddəti tamam olmuş sifarişlərin avtomatik olaraq return olunması əmri';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now('Asia/Baku');

        $expiredOrders = Orders::where('barcode_expiry_time', '<', $now)
                                    ->where('order_status', 'pending')
                                    ->get();

        if ($expiredOrders->isEmpty()) {
            $this->info('Vaxtı bitmiş sifariş yoxdur.');
            return;
        }

        DB::transaction(function () use ($expiredOrders) {
            foreach ($expiredOrders as $order) {

                $order->update(['order_status' => 'refunded']);

                OrderDetails::where('order_id', $order->id)
                    ->update(['ped_status' => 'returned']);
            }
        });
        DB::commit();
        $this->info($expiredOrders->count() .' vaxtı keçmiş sifariş statusu dəyişdirildi.');
    }
}
