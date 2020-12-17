<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use App\Models\NguoiTimViec;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi thông báo đến Người tìm viêc';

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
        $nguoiTimViecALL = NguoiTimViec::query()->with([
            'getTaiKhoan'
        ])->get()->toArray();

        foreach ($nguoiTimViecALL as $row){
            $dataEmail = array(
                'subject' => ucwords('Gợi ý việc làm'),
                'view' => 'goi_y.index',
                'data' => $row
            );
            Mail::to($row['get_tai_khoan']['email'])->send(new SendEmail($dataEmail));
        }

//        $nguoiTimViecALL = NguoiTimViec::query()->getTaiKhoan
//        return 0;
    }
}
