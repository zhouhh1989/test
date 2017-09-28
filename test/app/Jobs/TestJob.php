<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Maatwebsite\Excel\Facades\Excel;


class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = [];
        $str = 'SDFSADFHFGHFGHFWERERYYTYUFGF';
        for($i = 0; $i<2000; $i++) {
            $data[] = [
                'id' => $i,
                'title' => $str
            ];
        }

//        Excel::create('ssss', function($excel) use($data) {
//
//            $excel->sheet('Sheetname', function($sheet) use($data) {
//
//                $sheet->fromArray($data);
//
//            });
//
//        })->store('xlsx', storage_path('excel/exports'));
        $this->readExcel();
    }

    public function readExcel(){
        $this->getmem('start');
       $er = Excel::selectSheetsByIndex(0)->load(storage_path('excel/exports/ssss.xlsx'), function($reader) {
            $reader = $reader->toArray();
            $reader = $reader[0];
        });
//        $ge = $er->getExcel();
//        $this->getmem('end');
//        $ge->disconnectWorksheets();
        $this->getmem('end');
    }

    public function getmem($str){
        var_dump($str . ':' . memory_get_usage()/(1024*1024) . 'M');
    }
}
