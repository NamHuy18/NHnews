<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    @extends('admin.layouts.master')

    @section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Tin
                            <small>{{$loaitin-> ten}}</small>
                        </h1>
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
                        <form action="admin/loaitin/edit/{{$loaitin->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            
                            
                            <div class="form-group">
                                <label>Tên Loại Tin</label>
                                <input class="form-control" name="ten" placeholder="Điền tên loại tin" value="{{$loaitin->ten}} "/>
                            </div>

                            <div class="form-group">
                                <label>Thể Loại</label>
                            <select class="form-control" name="theloai" >
                                
                                @foreach($theloai as $tl)
                                <option 
                                    @if($loaitin -> id_theloai == $tl -> id)
                                    {{"selected"}}
                                    @endif
                                 value="{{$tl->id}}">{{$tl->ten}}</option>
                                @endforeach
                            </select>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection

        


</body>
</html>