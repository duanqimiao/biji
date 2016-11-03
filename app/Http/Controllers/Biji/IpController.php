<?php

namespace App\Http\Controllers\Biji;

use App\Ip;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IpController extends Controller
{
    /**
     * @return $this
     */
    public function ip(){
        /*获得用户最新一次登录的IP地址资源句柄*/
        $ips = Ip::select('ips')->where('user_id',\Auth::id())->orderBy('id','DESC')->first();

        //获得上次登录的IP地址资源句柄
        $lastIp = Ip::select('ips')->where('user_id',\Auth::id())->first();

        //判断是否登录异常
        if(!($lastIp->ips == $ips->ips)){
            return response()->json(array(
                'info' => true
            ));
        }
    }
}
