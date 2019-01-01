<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;
use App\Theloai;
use App\Requests;

class loaitinController extends Controller
{

   public function getList(){

        $loaitin = Loaitin::all();
        $loaitin = Loaitin::paginate(4);
        return view('admin.loaitin.list',['loaitin'=>$loaitin]);
    }

    public function getAdd(){
        $theloai = Theloai::all();
        return view('admin.loaitin.add',['theloai'=>$theloai]);
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'ten'=>'required|min:3|max:100|unique:loaitin,ten'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên loại tin',
            'ten.min'=>'Tên loại tin có độ dài từ 3 đến 100 ký tự',
            'ten.max'=>'Tên loại tin có độ dài từ 3 đến 100 ký tự',
            'ten.unique'=>'Tên loại tin đã tồn tại'
        ]);

        $loaitin = new Loaitin;
        
        $loaitin->ten =$request->ten;
        $loaitin->tenkhongdau = changeTitle($request->ten);
        $loaitin->id_theloai =$request ->theloai;
        $loaitin->save();

        return redirect('admin/loaitin/add')->with('thongbao',' Thêm thành công');

    }

    public function getEdit($id){
        $theloai = Theloai::all();
        $loaitin = Loaitin::find($id);
        return view('admin.loaitin.edit', ['loaitin'=>$loaitin], ['theloai'=>$theloai]);
    }

    public function postEdit(Request $request,$id){

        $loaitin = Loaitin::find($id);

        $this->validate($request,[
            'ten'=>'required|min:3|max:100',
            
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên loại tin',
            'ten.min'=>'Tên loại tin có độ dài từ 3 đến 100 ký tự',
            'ten.max'=>'Tên loại tin có độ dài từ 3 đến 100 ký tự',
            
            
        ]);

       
        $loaitin -> ten= $request->ten;
        $loaitin ->tenkhongdau= changeTitle($request->ten);
        $loaitin->id_theloai =$request ->theloai;
        $loaitin->save();

        return redirect('admin/loaitin/edit/'.$id)->with('thongbao',' Sửa thành công');
    }

    public function getDelete($id){

        $loaitin = Loaitin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/list')->with('thongbao',' Xóa thành công');
    }
}
