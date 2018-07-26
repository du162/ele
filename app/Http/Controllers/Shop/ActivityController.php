<?php

namespace App\Http\Controllers\Shop;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //
    public function index()
    {
        //查询活动中的数据
        $activitys = Activity::where('end_time','>=',time())->get();

        return view('shop.activity.index', compact('activitys'));
    }
    public function details(Request $request,$id)
    {
        $act=Activity::find($id);

        return view('shop.activity.details',compact('act'));
    }

}
