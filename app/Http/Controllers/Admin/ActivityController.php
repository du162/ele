<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //
    public function index()
    {
        //查询活动中的数据
        $activitys = Activity::all();

        return view('admin.activity.index', compact('activitys'));
    }

    public function add(Request $request)
    {

        if ($request->isMethod('post')) {

            $activity = $request->input();
            $activity['start_time'] = strtotime($request->input('start_time'));
            $activity['end_time'] = strtotime($request->input('end_time'));

            Activity::create($activity);

            return redirect()->route('activity.index')->with('info', '活动添加成功');
        }
        return view('admin.activity.add');
    }

    public function edit(Request $request, $id)
    {
        $activity = Activity::find($id);
        if ($request->isMethod('post')) {

            $activitys = $request->input();
            $activitys['start_time'] = strtotime($request->input('start_time'));
            $activitys['end_time'] = strtotime($request->input('end_time'));
            $activity->update($activitys);
            return redirect()->route('activity.index')->with('success', '活动修改成功');
        }
        return view('admin.activity.edit', compact('activity'));
    }

    public function del($id)
    {

        Activity::findOrFail($id)->delete();

        return redirect()->route('activity.index')->with('danger', '活动删除成功');
    }

    //活动规定显示
    public function in($id){
        //dd($time);
        if ($id == 'not'){
            //查询活动中的数据
            $activitys = Activity::where('start_time','>',time())->get();
            //dd($activitys);

            return view('admin.activity.index', compact('activitys'));
        }
        if ($id == 'for'){
            //查询活动中的数据
            $activitys = Activity::where('start_time','<=',time())->where('end_time','>=',time())->get();

            return view('admin.activity.index', compact('activitys'));
        } if ($id == 'end'){
            //查询活动中的数据
            $activitys = Activity::where('end_time','<',time())->get();
            return view('admin.activity.index', compact('activitys'));
        }
    }

}
