<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Theloai;
use App\Banner;
use App\Loaitin;
use App\Tintuc;
use App\User;
use App\Contact;

class pageController extends Controller
{
    //

    function __construct(){

    	$theloai = Theloai::all();
    	view()->share('theloai',$theloai);

    }

    function home(){

    	$banner = Banner::all();
    	return view('front.pages.home', compact('banner'));
    }

    function loaitin($id){	

    	$loaitin = Loaitin::find($id);
    	$tintuc = Tintuc::where('id_loaitin',$id)->paginate(5);
    	return view('front.pages.loaitin', compact('tintuc','loaitin'));
    }

    function tintuc($id){

    	$tintuc = Tintuc::find($id);
    	$tinnoibat = Tintuc::where('noibat',1)->take(3)->get();
    	$tinlienquan = Tintuc::where('id_loaitin',$tintuc->id_loaitin)->take(4)->get();
    	return view('front.pages.tintuc', compact('tintuc','tinnoibat','tinlienquan'));
    }

    function getLogin(){

    	return view('front.pages.login');
    }

    function postLogin(Request $request){

    	$this->validate($request, [
    		'email'=>'required',
    		'password'=>'required'
    	],
    	[
    		'email.required'=>' Bạn chưa nhâp email',
    		'password.required'=>'Bạn chưa nhập mật khẩu'
    	]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
    		return redirect('home');
    	}
    	else{
    		return redirect('login')->with('thongbao', 'Đăng nhập thất bại');
    	}

    }

    function Logout(){

    	Auth::logout();
    	return redirect('home');
    }

    function getUser(){

    	$user = Auth::user();
    	return view('front.pages.user', compact('user'));
    }

    function postUser(Request $request){

    	$user = Auth::user();
        $this->validate($request,[
            'name'=>'required|min:3|max:100',


        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',


            
        ]);

      
        $user ->name= $request->name;

        
        if($request->changePassword == "on"){

        	$this->validate($request,[
        		'password'=>'required',
        		'passwordAgain'=>'required|same:password'
        	],
        	[
        		'password.required'=>'Bạn chưa nhập password',
        		'passwordAgain.required'=>'Bạn chưa nhập lại password',
        		'passwordAgain.same'=>'Mật khẩu không trùng khớp'
        	]);
        	$user->password= bcrypt($request->password);
        }
        


        $user->save();

        return redirect('user')->with('thongbao',' Sửa thành công');

    }

    function getSignup(){

    	return view('front.pages.signup');
    }

    function postSignup(Request $request){

    	$this->validate($request,[
            'name'=>'required|min:3|max:100',
            'email'=>'required',
            'password'=>'required',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên có độ dài từ 3 đến 100 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập password',
            'passwordAgain.required'=>'Bạn chưa nhập lại password',
        	'passwordAgain.same'=>'Mật khẩu không trùng khớp'
        ]);

        $user = new User;
        
        $user->name =$request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;

        $user->save();

        return redirect('signup')->with('thongbao','Chúc mừng bạn đã đăng ký thành công');
    }

    function Search(Request $request){

    	
    	$tintuc = Tintuc::where('tieude','like','%'.$request->key.'%')->orWhere('tomtat','like','%'.$request->key.'%')->take(30)->paginate(5);

    	return view('front.pages.search',compact('tintuc'));

    }

    function getContact(){

        return view('front.pages.contact');
    }

    function postContact(Request $request){

        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'email'=>'required',
            'noidung'=>'required'

        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên có độ dài từ 3 đến 100 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'noidung.required'=>'Bạn chưa nhập nội dung phản hồi'
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->noidung = $request->noidung;
        $contact->created_at = $request->created_at;

        $contact->save();

        return redirect('contact')->with('thongbao',' Bạn đã gửi phản hồi thành công');
    }

    function About(){

        return view('front.pages.about');
    }

}

