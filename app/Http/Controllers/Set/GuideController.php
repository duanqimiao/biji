<?php

namespace App\Http\Controllers\Set;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuideController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function guide(){
        return view('setting.guide');
    }
}
