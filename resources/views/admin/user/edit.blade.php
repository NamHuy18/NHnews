
    @extends('admin.layouts.master')

    @section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user-> name}}</small>
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
                        <form action="admin/user/edit/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" placeholder="Điền tên " value="{{$user->name}} "/>
                            </div>
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Điền email " value="{{$user->email}} " readonly="" />
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label> Đổi Mật Khẩu</label>
                                
                                <input type="password" class="form-control password" name="password" placeholder="Điền password" disabled="" />
                            </div>

                            <div class="form-group">
                                <label>Quyền</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                        @if($user->quyen == 1)
                                            {{"checked"}}
                                        @endif

                                            type="radio">Có

                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" 
                                        @if($user->quyen == 0)
                                            {{"checked"}}
                                        @endif
                                            type="radio"> Không
                                
                                </label>
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

@section('script')
<script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked")){
                $(".password").removeAttr('disabled');
            }
            else{
                $(".password").attr('disabled','');
            }
        });
    });
</script>
@endsection
