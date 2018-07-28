<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends BaseController
{
    //
    public function index()
    {
        $users = User::all();

        return view('admin.audit.index', compact('users'));
    }

    public function start(Request $request, $id)
    {
        $user = User::find($id);
        $shop = Shop::where('id', $user->shop_id)->first();
        $user['status'] = 1;
        $user->save();
        $shop->status = 1;
        $shop->save();
        $request->session()->flash('success', '启用成功');
        return redirect()->route('audit.index');

    }

    public function disable(Request $request, $id)
    {
        $user = User::find($id);
        $shop = Shop::where('id', $user->shop_id)->first();
        $user['status'] = 0;
        $user->save();
        $shop->status = 0;
        $shop->save();
        $request->session()->flash('success', '禁用成功');
        return redirect()->route('audit.index');
    }
}
