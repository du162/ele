<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\ShopCategories;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Exception\LogicException;

class UserController extends Controller
{
    //

    public function index(){

        $users=User::all();

        return view('shop.user.index',compact('users'));
    }
    public function add(Request $request){

        if ($request->isMethod('post')) {
            try{
                //事务开启
                DB::beginTransaction();
                $user=$request->post();
                $user['password']=bcrypt($user['password']);
                $userid=User::create($user);
                if ($userid){
                    $shop=$request->input();
                    $shop['shop_img']= "";
                    $shopid=Shop::create($shop);
                    $user=User::find($userid->id);
                    $user['shop_id']=$shopid->id;
                    $user->save();
                    DB::commit();
                    echo '成功';
                    return redirect()->route('user.index');

                }
            }catch (LogicException $e){

                DB::rollBack();

            }
        }
        $shopcates=ShopCategories::all();

        return view('shop.user.add',compact('shopcates'));
    }
}
