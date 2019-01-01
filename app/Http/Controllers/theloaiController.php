<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Requests;

class theloaiController extends Controller
{
    //
    public function getList(){

        $theloai = Theloai::all();
        $theloai = Theloai::paginate(4);
    	return view('admin.theloai.list',['theloai'=>$theloai]);
    }

    public function getAdd(){
    	return view('admin.theloai.add');
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'ten'=>'required|min:3|max:100|unique:theloai,ten'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'ten.max'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'ten.unique'=>'Tên thể loại đã tồn tại'
        ]);

        $theloai = new Theloai;
        
        $theloai->ten =$request->ten;
        $theloai->tenkhongdau = changeTitle($request->ten);

        $theloai->save();

        return redirect('admin/theloai/add')->with('thongbao',' Thêm thành công');

    }

    public function getEdit($id){

        $theloai = Theloai::find($id);
    	return view('admin.theloai.edit', ['theloai'=>$theloai]);
    }

    public function postEdit(Request $request,$id){

        $theloai = Theloai::find($id);

        $this->validate($request,[
            'ten'=>'required|min:3|max:100',
            
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'ten.max'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            
            
        ]);

      
        $theloai -> ten= $request->ten;
        $theloai ->tenkhongdau= changeTitle($request->ten);
        $theloai->save();

        return redirect('admin/theloai/edit/'.$id)->with('thongbao',' Sửa thành công');
    }

    public function getDelete($id){

        $theloai = Theloai::find($id);
        $theloai->delete();

        return redirect('admin/theloai/list')->with('thongbao',' Xóa thành công');
    }
}
