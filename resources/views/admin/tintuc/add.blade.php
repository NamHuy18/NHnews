@extends('admin.layouts.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Thêm Tin Tức</h1>                
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif

                <form action="admin/tintuc/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label>Thể Loại</label>
                    <select class="form-control" name="theloai" id="theloai">
                        
                        @foreach($theloai as $tl)
                        <option value="{{$tl->id}}">{{$tl->ten}}</option>   
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Loại Tin</label>
                    <select class="form-control" name="loaitin" id="loaitin">
                        
                        @foreach($loaitin as $lt)
                        <option value="{{$lt->id}}">{{$lt->ten}}</option>
                        @endforeach
                    </select>
                    </div>



                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="tieude" placeholder="Nhập tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea name="tomtat" class="form-control " rows="3" ></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="demo" name="noidung" class="form-control ckeditor" ></textarea>
                    </div>

                     <div class="form-group">
                        <label>Tác Giả</label>
                        <input class="form-control" name="tacgia" placeholder="Nhập người viết bài">
                    </div>

                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="image" id="image" >
                    </div>

                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="noibat" value="1" type="radio">Có

                        </label>
                        <label class="radio-inline">
                            <input name="noibat" value="0" type="radio"> Không
                            
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection

@section('script')
<script> 
    $(document).ready(function(){
       
        $("#theloai").change(function(){
            var id_theloai = $(this).val();
            $.get("admin/ajax/loaitin/"+id_theloai, function(data){
                $("#loaitin").html(data);
            });
        });
    });
</script>
@endsection


