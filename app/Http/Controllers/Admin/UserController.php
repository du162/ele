<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::all();

        return view('admin.audit.index',compact('users'));
    }
    public function start(Request $request,$id){
        $user=User::find($id);
        $user['status']=1;
        $user->save();
        $request->session()->flash('success','启用成功');
        return redirect()->route('audit.index');
    }
    public function disable(Request $request,$id){
        $user=User::find($id);
        $user['status']=0;
        $user->save();
        $request->session()->flash('success','禁用成功');
        return redirect()->route('audit.index');
    }
}
