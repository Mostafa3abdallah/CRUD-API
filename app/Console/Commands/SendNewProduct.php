<?php

namespace App\Console\Commands;

use App\Mail\SendNewProductNotification;
use App\Models\User;
use Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewProduct extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send-product-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send New Product Notification to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {

        $sent = 0;
        try {
            $users = User::all();

            foreach ($users as $user) {
                $emails = $user->pluck('email')->toArray();
            }

            Mail::to($emails)->send(new SendNewProductNotification());

            return $sent ? 1 : 0;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
