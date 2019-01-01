
    @extends('admin.layouts.master')

    @section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Banner
                            <small>{{$banner-> ten}}</small>
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
                        <form action="admin/banner/edit/{{$banner->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="ten" placeholder="Điền tên " value="{{$banner->ten}} "/>
                            </div>
                            
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                    <p><img width="300px" src="upload/banner/{{$banner->image}}"></p>

                                <input type="file" name="image" id="image"">
                            </div>

                            <div class="form-group">
                                <label>Nội Dung</label>
                                <input class="form-control" name="noidung" placeholder="Điền nội dung " value="{{$banner->noidung}} "/>
                            </div>

                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Điền link " value="{{$banner->link}} "/>
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

