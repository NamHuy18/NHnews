<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    //
     public function getList(){
        $user = User::paginate(4);
    	return view('admin.user.list', compact('user'));
    }

    public function getAdd(){
    	return view('admin.user.add');
    }

    public function postAdd(Request $request){
            $this->validate($request,[
            'name'=>'required|min:3|max:100|unique:users,name',
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.min'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'name.unique'=>'Tên thể loại đã tồn tại',
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập password'
        ]);

        $user = new User;
        
        $user->name =$request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;

        $user->save();

        return redirect('admin/user/add')->with('thongbao',' Thêm thành công');
    }

    public function getEdit($id){

        $user= User::find($id);
    	return view('admin.user.edit', compact('user'));
    }

    public function postEdit(Request $request,$id){
        $user = User::find($id);
        $this->validate($request,[
            'name'=>'required|min:3|max:100',

        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',

            
        ]);

      
        $user ->name= $request->name;
        $user ->quyen = $request->quyen;
        
        if($request->changePassword == "on"){

        	$this->validate($request,[
        		'password'=>'required'
        	],
        	[
        		'password.required'=>'Bạn chưa nhập password'
        	]);
        	$user->password= bcrypt($request->password);
        }
        


        $user->save();

        return redirect('admin/user/edit/'.$id)->with('thongbao',' Sửa thành công');
    }

    public function getDelete($id){

        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/list')->with('thongbao',' Xóa thành công');
    }

    public function getloginAdmin(){

    	return view('admin.login');
    }

    public function postloginAdmin(Request $request){

    	$this->validate($request, [
    		'email'=>'required',
    		'password'=>'required'
    	],
    	[
    		'email.required'=>' Bạn chưa nhâp email',
    		'password.required'=>'Bạn chưa nhập mật khẩu'
    	]);

    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

    		return redirect('admin/tintuc/list');
    	}
    	else{
    		return redirect('admin/login')->with('thongbao', 'Đăng nhập thất bại');
    	}
    }

    public function LogoutAdmin(){
    	Auth::logout();
    	return redirect('admin/login');
    }
}
