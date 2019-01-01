<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Tintuc; 
use App\User;

class commentController extends Controller
{
    //
    public function getList($id){

        $tintuc = Tintuc::find($id);
        $comment = Comment::paginate(4);
       
    	return view('admin.comment',compact('tintuc','comment'));
    }

    public function getDelete($id, $id_tintuc){
    	$comment = Comment::find($id);
        $comment->delete();

        return redirect('admin/comment/'.$id_tintuc)->with('thongbao','Xóa Thành Công');
    }

    public function postComment(Request $request, $id){

        $id_tintuc = $id;
        $tintuc = Tintuc::find($id);
        $comment = new Comment;
        $comment->id_tintuc = $id_tintuc;
        $comment->id_users = Auth::user()->id;
        $comment->noidung = $request->noidung;

        $comment->save();

        return redirect("tintuc/$id/".$tintuc->tieudekhongdau.".html")->with('thongbao','Gửi Bình Luận Thành Công');
    }

}
