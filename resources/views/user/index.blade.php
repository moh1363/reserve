@extends('layouts.app')
@section('title')
    {{__('user.index')}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="success_message">

                </div>

                <div class="card">
                    <div class="card-header">
                        <button style="float: left" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>

                        {{__('user.index')}}

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>{{__('row1')}}</th>
                                    <th>{{__('user.name')}}</th>
                                    <th>{{__('user.codemelli')}}</th>
                                    <th>{{__('access')}}</th>
                                    <th>{{__('action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @if(count($users)==0)
                                    <tr>
                                        <td colspan="9">{{__('nodata')}}</td>

                                    </tr>
                                @else
                                    @foreach($users as $user)

                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- add user Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('user.create')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{--                    <h5 class="modal-title" id="exampleModalLabel">ایجاد فرآورده</h5>--}}
                    {{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <ul id="saveform_errlist"></ul>


                        <label for="name">{{__('user.name')}}</label><br>
                        <input required  class="name form-control" name="name" >
                        <br>

                        <label for="codemelli">{{__('user.codemelli')}}</label><br>
                        <input minlength="10" maxlength="10" required class="codemelli form-control" name="codemelli" >
                        <br>

                        <label for="role">{{__('user.role')}}</label><br>
                        <select name="role" class="role form-select" >
                            <option value="1">{{__('user.admin')}}</option>
                            <option value="2">{{__('user.operator')}}</option>
                        </select>
                        {{--                            <input required id="price" name="role" >--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            <button  class="btn btn-primary btn-submit">{{__('create')}}</button>
                        </div>
                </div>
            </div>
        </div>
    </div>



{{--    edit modal--}}
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('user.edit')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{--                    <h5 class="modal-title" id="exampleModalLabel">ایجاد فرآورده</h5>--}}
                    {{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <ul id="updateform_errlist"></ul>
                    <input type="hidden" id="edituserid"><br>

                    <label for="name">{{__('user.name')}}</label><br>
                    <input required id="edit_name" class="name form-control" size="50px" name="name" >
                    <br>

                    <label for="codemelli">{{__('user.codemelli')}}</label><br>
                    <input id="edit_codemelli" minlength="10" maxlength="10" required class="codemelli form-control" name="codemelli" >
                    <br>

                    <label for="role">{{__('user.role')}}</label><br>
                    <select id="edit_role" name="role" class="role form-select" >
                        <option value="1">{{__('user.admin')}}</option>
                        <option value="2">{{__('user.operator')}}</option>
                    </select>
                    {{--                            <input required id="price" name="role" >--}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                        <button  class="btn btn-primary btn-edit">{{__('edit')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    delete modal--}}
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('user.delete')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{--                    <h5 class="modal-title" id="exampleModalLabel">ایجاد فرآورده</h5>--}}
                    {{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <input type="hidden" id="deleteuserid"><br>
                    <h4>کاربر مورد نظر حذف گردد؟</h4>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                        <button  class="btn btn-primary btn-delete">{{__('delete')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function(){
            // fetchuser
            fetchuser();
            function fetchuser(){
                $.ajax({
                    type :"GET",
                    url : "fetch-user",
                    dataType : "json",
                    success : function (response) {
                        // console.log(response.users)
                        $('tbody').html("");
                        var i =1;
                        $.each(response.users,function (key,item) {
                            if(item.role==1){
                                var role='مدیر';
                            }else if(item.role==2){
                                var role='اپراتور';
                            }
                            $('tbody').append( ' <tr>\
                                <td>'+  i++ +'</td>\
                                <td>'+item.name+'</td>\
                                <td>'+item.codemelli+'</td>\
                                <td>'+role+'</td>\
                                <td><button type="button"   value="'+item.id+'"  class="edit-button btn btn-primary">{{__('edit')}}</button> <button  type="button" class="delete-button btn btn-danger"  value="'+item.id+'" >{{__('delete')}}</button></td>\
                                </tr>'
                                    );
                        });
                    }

                });
            }
// endfetchuser

            // deleteuser
            $(document).on('click','.delete-button',function (e) {
                e.preventDefault();
                var user_id=$(this).val();
                    // alert(user_id);
                $('#deleteuserid').val(user_id);
                $('#deletemodal').modal('show');
            });
            $(document).on('click','.btn-delete',function (e) {
                e.preventDefault();
                $(this).text('در حال پاک کردن...')
                var user_id = $('#deleteuserid').val();
                $.ajaxSetup({
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/delete-user/" + user_id,
                    success: function (response) {
                        // console.log(response);
                        $('#success_message').addClass("alert alert-success");
                        $('#success_message').text(response.message);
                        $('#deletemodal').modal('hide');
                        fetchuser();

                    }
                });
            });
            // enddeleteuser

            // edituser

                $(document).on('click','.edit-button',function (e) {
                e.preventDefault();
                var user_id=$(this).val();
                // console.log(user_id);
                $('#editmodal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-user/"+user_id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if(response.status==404){
                            $('#success_message').html("");
                            $('#success_message').addClass("alert alert-danger");
                            $('#success_message').text(response.message);
                        }
                        else{
                           $('#edit_name').val(response.user.name);
                           $('#edit_codemelli').val(response.user.codemelli);
                           $('#edit_role').val(response.user.role);
                           $('#edituserid').val(user_id);

                        }
                    }
                });

            });
            $(document).on('click','.btn-edit',function (e) {
                e.preventDefault();
                $(this).text('درحال ویرایش ...')
                var user_id=$('#edituserid').val();
                var data={
                    'name' :$('#edit_name').val(),
                    'codemelli' :$('#edit_codemelli').val(),
                    'role' :$('#edit_role').val(),
                }
                // console.log(user_id);
                $.ajaxSetup({
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/update-user/"+user_id,
                    data :data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if(response.status==400){
                            $('#updateform_errlist').html("");
                            $('#updateform_errlist').addClass("alert alert-danger");
                            $.each(response.errors,function (key,err_values) {
                                $('#updateform_errlist').append('<li>'+err_values+'</li>');

                            });
                            $('.btn-edit').text('ویرایش');

                        }
                        else if(response.status==404){
                            $('#updateform_errlist').html("");
                            $('#success_message').addClass("alert alert-success");
                            $('#success_message').text(response.message);
                            $('.btn-edit').text('ویرایش');

                        }
                        else{
                            $('#updateform_errlist').html("");
                            $('#success_message').addClass("alert alert-success");
                            $('#success_message').html("");
                            $('#success_message').text(response.message);
                            $('#editmodal').modal('hide');
                            $('.btn-edit').text('ویرایش');

                            fetchuser();
                        }
                    }
                });

            });
            // endedituser

            // adduser
            $(document).on('click','.btn-submit',function (e){
                e.preventDefault();
                // console.log("hello");
                var data={
                    'name' :$('.name').val(),
                    'codemelli' :$('.codemelli').val(),
                    'role' :$('.role').val(),
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    url : "/users",
                    data : data,
                    dataType : "json",
                    success :function (response) {
                        // console.log(response);
                        if(response.status == 400)
                        {
                            $('#saveform_errlist').html("");
                            $('#saveform_errlist').addClass('alert alert-danger');

                            $.each(response.errors,function (key,err_values){
                                $('#saveform_errlist').append('<li>'+err_values+'</li>');

                            });


                        }
                        else{
                            $('#saveform_errlist').html("");

                            $('#success_message').addClass('alert alert-success')
                            $('#success_message').text(response.message)
                            $('#exampleModal').modal('hide');
                            $('#exampleModal').find('input').val("");
                            fetchuser();

                        }
                    }
                });



            }) ;
        });
    </script>

@endsection
