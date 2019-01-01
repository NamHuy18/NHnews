@extends('admin.layouts.master')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Bình Luận
                    <small>Danh Sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>ID User</th>
                        <th>Nội Dung</th>
                        <th>Thời Gian Đăng</th>
                        
                        <th>Delete</th>

                    </tr>
                </thead>
                @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                <tbody>
                  
                    
                       @foreach($tintuc->comment as $cm)
                    <tr class="odd gradeX" align="center">
                        <td>{{$cm->id}}</td>
                        <td>{{$cm->user->name}}</td>
                        <td>{{$cm->noidung}}</td>
                        <td>{{$cm->created_at}}</td>
                        

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$cm->id}}/{{$tintuc->id}}"> Delete</a></td>

                    </tr>
                   
                    
                     @endforeach
                <!--  </form> -->
                </tbody>
            </table>
            {!! $comment -> links()!!}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
