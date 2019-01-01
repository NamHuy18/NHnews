<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner; 

class bannerController extends Controller
{
    //
    public function getList(){
        $banner = Banner::paginate(4);
    	return view('admin.banner.list', compact('banner'));
    }

    public function getAdd(){
    	return view('admin.banner.add');
    }

    public function postAdd(Request $request){
            $this->validate($request,[
            'ten'=>'required|min:3|max:100|unique:banner,ten'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'ten.max'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'ten.unique'=>'Tên thể loại đã tồn tại'
        ]);

        $banner = new Banner;
        
        $banner->ten =$request->ten;
        $banner->noidung = $request->noidung;
        $banner->link = $request->link;


        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png'){
                    return view('admin/banner/add')->with('loi',' Đuôi ảnh không hợp lệ');
                }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/banner/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move('upload/banner', $image);
            $banner->image = $image;
        }
        else{
            $banner->image = "";
        }


        $banner->save();

        return redirect('admin/banner/add')->with('thongbao',' Thêm thành công');
    }

    public function getEdit($id){

        $banner= Banner::find($id);
    	return view('admin.banner.edit', compact('banner'));
    }

    public function postEdit(Request $request,$id){
        $banner = Banner::find($id);
        $this->validate($request,[
            'ten'=>'required|min:3|max:100',
            'noidung'=>'required'
            
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'ten.min'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'ten.max'=>'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'noidung.required'=>'Bạn chưa nhập nội dung'
            
            
        ]);

      
        $banner -> ten= $request->ten;
        $banner ->noidung = $banner->noidung;
        $banner->link = $banner->link;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png'){
                    return view('admin/banner/edit')->with('loi',' Đuôi ảnh không hợp lệ');
                }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/banner/".$image)) {
                $image = str_random(4)."_".$name;
            }
            unlink("upload/banner/".$banner->image);
            $file->move('upload/banner', $image);
           
            $banner->image = $image;
        }


        $banner->save();

        return redirect('admin/banner/edit/'.$id)->with('thongbao',' Sửa thành công');
    }

    public function getDelete($id){

        $banner = banner::find($id);
        $banner->delete();

        return redirect('admin/banner/list')->with('thongbao',' Xóa thành công');
    }
    }

