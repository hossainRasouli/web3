<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(){

        $users=User::all()->where('status','=',0);

        return view('user.index',compact('users'))->with(['panel_title'=>'لیست کاربرها']);

    }
    public function create(Request $request){

        if($request->isMethod('get'))
            return view('user.form')->with(['panel_title'=>'ایجاد کاربر جدید']);
        else{
            $validator =Validator::make(Input::all(),[
               'name'=>'required',
               'username'=>'required|alpha_dash|unique:users',
                'password'=>'required|confirmed',

            ]);
            if($validator->fails()){


                return array(
                  'fail'=>true,
                    'errors'=>$validator->getMessageBag()->toArray(),

                );

            }

            $user =new User();
            $user->name=Input::get('name');
            $user->last_name=Input::get('last_name')?Input::get('last_name'):'';
            $user->username=Input::get('username');
            $user->password=bcrypt(Input::get('password'));
            $user->user_level=Input::get('user_level');
            $user->save();





        }
        return array(
            'content'=>'content',
            'url'=>route('user.list')
        );




    }
    public function update(Request $request,$id){

        if($request->isMethod('get')) {
            $status=1;

            return view('user.form', ['user' => User::find($id)],compact('status'))->with(['panel_title' => 'ویرایش کاربر']);

        } else{
            $user =User::find($id);
            $password=$user->password;
            $old_password=$request->get('old-password');
            $rules=[];
            if(strtolower($user->username)!=strtolower(Input::get('username')))
                $rules+=['username'=>'required|alpha_dash|unique:users'];

            if(Input::get('password')!='')

                $rules+=['password'=>'confirmed'];

            $validator =Validator::make(Input::all(),$rules);
            if($validator->fails()){


                return array('fail'=>true,
                    'errors'=>$validator->getMessageBag()->toArray());
            }
            if($password===bcrypt($old_password)){

                $user->username=Input::get('username');
                $user->user_level=Input::get('user_level');
                if(Input::get('password')!='')
                    $user->password=bcrypt(Input::get('password'));
                $user->name=Input::get('name');
                $user->last_name=Input::get('last_name')?Input::get('last_name'):'no enter';
                $user->save();



            }
            return array(
                'content'=>'content',
                'url'=>route('user.list')
            );








        }



    }
    public function delete($id){

        $user=User::find($id);
        $user->status=1;
        $user->save();
        return redirect('user');

    }
}
