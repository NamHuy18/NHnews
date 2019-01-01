
	@extends('admin.layouts.master')

	@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Liên Hệ
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Nội Dung</th>
                                <th>Ngày Đăng</th>
                        </thead>
                          @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <tbody>
                            @foreach($contact as $ct)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ct->id}}</td>
                                <td>{{$ct->name}}</td>
                                <td>{{$ct->email}}</td>
                                <td>{{$ct->noidung}}</td>
                                <td>{{$ct->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $contact -> links()!!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        @endsection

