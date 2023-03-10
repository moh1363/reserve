@extends('layouts.app')
@section('title')
    {{__('product.managment')}}
@endsection
@section('content')





    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div id="success_message"></div>
                <div class="card">
                    <div class="card-header">
                        <button style="float: left" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" title="{{__('product.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>

                    {{__('product.managment')}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered">
                                <thead style="text-align: center">
                                <tr>
                                    <th width="3%">{{__('row1')}}</th>
                                    <th>{{__('product.name')}}</th>
                                    <th>{{__('product.price')}}</th>
                                    <th>{{__('product.expire')}}</th>
                                    <th width="20%">{{__('created_by')}}</th>
                                    <th width="20%">{{__('updated_by')}}</th>
                                    <th>{{__('action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @if(count($products)==0)
                                    <tr>
                                        {{__('nodata')}}
                                    </tr>
                                @else
                                    @foreach($products as $product)

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





    <!-- Modal -->
    <!-- add product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('product.create')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{--                    <h5 class="modal-title" id="exampleModalLabel">?????????? ??????????????</h5>--}}
                    {{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <ul id="saveform_errlist"></ul>


                    <label for="name">{{__('product.name')}}</label><br>
                    <input required  class="name form-control" name="name" >
                    <br>

                    <label for="price">{{__('product.price')}}</label><br>
                    <input  required class="price  form-control" name="price" >
                    <br>
                    <label for="expir_date">{{__('product.expire')}}</label><br>
                    <select name="expire_date"  class="expire_date">
                        @for ($x = 1; $x <= 31; $x++)
                            <option >{{$x}}</option>
                        @endfor
                    </select>

                    <br>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">????????</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{__('product.edit')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{--                    <h5 class="modal-title" id="exampleModalLabel">?????????? ??????????????</h5>--}}
                    {{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <ul id="updateform_errlist"></ul>
                    <input type="hidden" id="edituserid"><br>

                    <label for="product">{{__('product.name')}}</label><br>
                    <input required id="edit_name" class="name  form-control" name="name" >
                    <br>

                    <label for="price">{{__('product.price')}}</label><br>
                    <input id="edit_price"  required class="product  form-control" name="product" >
                    <br>
                    <label for="price">{{__('product.expire')}}</label><br>
                    <select name="expire_date" id="edit_expire_date" class="edit_expire_date">
                        @for ($x = 1; $x <= 31; $x++)
                            <option>{{$x}}</option>
                        @endfor
                    </select>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">????????</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{__('product.delete')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{--                    <h5 class="modal-title" id="exampleModalLabel">?????????? ??????????????</h5>--}}
                    {{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <input type="hidden" id="deleteuserid"><br>
                    <h4>?????????????? ???????? ?????? ?????? ??????????</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">????????</button>
                    <button  class="btn btn-danger btn-delete">{{__('delete')}}</button>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script>
        $(document).ready(function(){
            // fetchproduct
            fetchproduct();
            function fetchproduct(){
                $.ajax({
                    type :"GET",
                    url : "/fetch-product",
                    dataType : "json",
                    success : function (response) {
                        // console.log(response.users)
                        $('tbody').html("");
                        var i=1;
                        $.each(response.products,function (key,item) {

                            $('tbody').append( ' <tr>\
                                <td>'+ i++ +'</td>\
                                <td>'+item.name+'</td>\
                                <td >'+item.price+'</td>\
                                <td>'+item.expire_date+'</td>\
                                <td>'+item.user.name+'</td>\
                                <td>'+item.user.name+'</td>\
                                <td><button type="button"   value="'+item.id+'"  class="edit-button btn btn-primary">{{__('edit')}}</button> <button  type="button" class="delete-button btn btn-danger"  value="'+item.id+'" >{{__('delete')}}</button></td>\
                                </tr>'
                            );
                        });
                    }

                });
            }
// endfetchproduct

            // deleteuser
            $(document).on('click','.delete-button',function (e) {
                e.preventDefault();
                var product_id=$(this).val();
                // alert(product_id);
                $('#deleteuserid').val(product_id);
                $('#deletemodal').modal('show');
            });
            $(document).on('click','.btn-delete',function (e) {
                e.preventDefault();
                // $(this).text('???? ?????? ?????? ????????...')
                var product_id = $('#deleteuserid').val();
                $.ajaxSetup({
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/delete-product/" + product_id,
                    success: function (response) {
                        // console.log(response);
                        $('#success_message').addClass("alert alert-danger");
                        $('#success_message').text(response.message);
                        $('#success_message').hide(10000);
                        $('#deletemodal').modal('hide');
                        fetchproduct();

                    }
                });
            });
            // enddeleteuser

            // edituser

            $(document).on('click','.edit-button',function (e) {
                e.preventDefault();
                var product_id=$(this).val();
                // console.log(product_id);
                $('#editmodal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-product/"+product_id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if(response.status==404){
                            $('#success_message').html("");
                            $('#success_message').addClass("alert alert-danger");
                            $('#success_message').text(response.message);
                        }
                        else{
                            $('#edit_name').val(response.product.name);
                            $('#edit_price').val(response.product.price);
                            $('#edit_expire_date').val(response.product.expire_date);
                            $('#edituserid').val(product_id);

                        }
                    }
                });

            });
            $(document).on('click','.btn-edit',function (e) {
                e.preventDefault();
                // $(this).text('?????????? ???????????? ...')
                var product_id=$('#edituserid').val();
                var data={
                    'name' :$('#edit_name').val(),
                    'price' :$('#edit_price').val(),
                    'expire_date' :$('#edit_expire_date').val(),
                }

                // console.log(product_id);
                $.ajaxSetup({
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/update-product/"+product_id,
                    data :data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if(response.status==400){
                            $('#updateform_errlist').html("");
                            $('#updateform_errlist').addClass("alert alert-danger");
                            $('#updateform_errlist').addClass("alert alert-danger");
                            $.each(response.errors,function (key,err_values) {
                                $('#updateform_errlist').append('<li>'+err_values+'</li>');

                            });
                            $('.btn-edit').text('????????????');

                        }
                        else if(response.status==404){
                            $('#updateform_errlist').html("");
                            $('#success_message').addClass("alert alert-success");
                            $('#success_message').text(response.message);
                            // $('#success_message').hide(10000);

                            $('.btn-edit').text('????????????');

                        }
                        else{
                            $('#updateform_errlist').html("");
                            $('#success_message').addClass("alert alert-success");
                            $('#success_message').html("");
                            $('#success_message').text(response.message);
                            $('#editmodal').modal('hide');
                            $('.btn-edit').text('????????????');

                            fetchproduct();
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
                    'price' :$('.price').val(),
                    'expire_date' :$('.expire_date').val(),
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    url : "/product",
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

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#success_message').hide(10000);
                            $('#exampleModal').modal('hide');
                            $('#exampleModal').find('input').val("");
                            fetchproduct();

                        }
                    }
                });



            }) ;
        });
    </script>


@endsection
