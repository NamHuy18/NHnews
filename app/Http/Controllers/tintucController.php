<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tintuc;
use App\Loaitin;
use App\Theloai;
use App\Requests;

class tintucController extends Controller
{
    public function getList(){

        $tintuc = Tintuc::orderBy('id','DESC')->get();
        $tintuc = Tintuc::paginate(6);

        return view('admin.tintuc.list',['tintuc'=>$tintuc]);
    }

    public function getAdd(){
        $theloai = Theloai::all();
        $loaitin = Loaitin::all();


        return view('admin.tintuc.add',compact('theloai','loaitin'));
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'tieude'=>'required|min:3|max:100|unique:tintuc,tieude',
            'tomtat'=>'required',
            'noidung'=>'required'
        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề tin tức',
            'tieude.min'=>'Tiêu đề tin tức có độ dài từ 3 đến 100 ký tự',
            'tieude.max'=>'Tiêu đề tin tức có độ dài từ 3 đến 100 ký tự',
            'tieude.unique'=>'Tiêu đề tin tức đã tồn tại',
            'tomtat.required'=>'Bạn chưa nhập tóm tắt',
            'noidung.required'=>'Bạn chưa nhập nội dung'

        ]);

        $tintuc = new Tintuc;
        
        $tintuc->tieude =$request->tieude;
        $tintuc->tieudekhongdau = changeTitle($request->tieude);
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        $tintuc->id_loaitin =$request ->loaitin;
        $tintuc->id_theloai=$request->theloai;
        $tintuc->noibat=$request->noibat;
        $tintuc->tacgia=$request->tacgia;
        
  
        
        //Upload Hinh

        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file[0]->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png'){
                    return view('admin/tintuc/add')->with('loi',' Đuôi ảnh không hợp lệ');
                }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move('upload/tintuc', $image);
            $tintuc->image = $image;
        }
        else{
            $tintuc->image = "";
        }
        $tintuc->save();

        return redirect('admin/tintuc/add')->with('thongbao',' Thêm thành công');

    }

    public function getEdit($id){
        
        $theloai = Theloai::all();
        $loaitin = Loaitin::all();
        $tintuc = Tintuc::find($id);

        return view('admin.tintuc.edit',compact('theloai','loaitin','tintuc'));
    }

    public function postEdit(Request $request,$id){

        $tintuc = Tintuc::find($id);

        $this->validate($request,[
            'tieude'=>'required|min:3|max:100',
            
        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề tin tức',
            'tieude.min'=>'Tiêu đề tin tức có độ dài từ 3 đến 100 ký tự',
            'tieude.max'=>'Tiêu đề tin tức có độ dài từ 3 đến 100 ký tự',
            
            
        ]);

        $tintuc->tieude =$request->tieude;
        $tintuc->tieudekhongdau = changeTitle($request->tieude);
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        $tintuc->id_loaitin =$request ->loaitin;
        $tintuc->id_theloai=$request->theloai;
        $tintuc->noibat=$request->noibat;
        $tintuc->tacgia=$request->tacgia;
      

        
        //Upload Hinh

        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png'){
                    return view('admin/tintuc/edit')->with('loi',' Đuôi ảnh không hợp lệ');
                }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$image)) {
                $image = str_random(4)."_".$name;
            }
            unlink("upload/tintuc/".$tintuc->image);
            $file->move('upload/tintuc', $image);
            
            $tintuc->image = $image;
        }

        $tintuc->save();

        return redirect('admin/tintuc/edit/'.$id)->with('thongbao',' Sửa thành công');
    }

    public function getDelete($id){

        $tintuc = Tintuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/list')->with('thongbao',' Xóa thành công');
    }
}
