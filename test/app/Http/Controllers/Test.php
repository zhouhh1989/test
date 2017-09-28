<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

class Test extends Controller
{

    public function index()
    {
        Redis::set('ss','ss');

//        for($i = 0; $i <10; $i++) {
//            dispatch(new TestJob());
//            Storage::put('test.txt',$i);
//        }

        return [];
    }
}
