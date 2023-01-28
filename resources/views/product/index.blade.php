@extends('layouts.app')
@section('title')
    {{__('product.managment')}}
@endsection
@section('content')





    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                <thead>
                                <tr>
                                    <th>{{__('row1')}}</th>
                                    <th>{{__('product.name')}}</th>
                                    <th>{{__('product.price')}}</th>
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
                                        <tr>

                                            <td>{{$i++}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>

                                                <a href=""data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal1" title="{{__('edit')}}">
                                                    <i class="fa fa-edit" aria-hidden="true"></i></a>


                                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{__('product.edit')}}</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('product.update',$product->id)}}" method="post">
                                                                @method('patch')
                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                                @csrf

                                                                <input hidden size="4" name="row">
                                                                <label for="name">{{__('product.name')}}</label><br>

                                                                <input required id="name" size="60px" name="name" value="{{$product->name}}">
                                                                <br>
                                                                <label for="price">{{__('product.price')}}</label><br>

                                                                <input required id="price" name="price" value="{{$product->price}}">
                                                                {{--                        <button size="5" type="submit">ایجاد</button>--}}

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                                                    <button type="submit" class="btn btn-primary">{{__('edit')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                                <a title="{{__('delete')}}" href="" data-bs-toggle="modal" data-bs-target="#deleteModal" data-productid="{{$product['id']}}"><i class="fas fa-trash-alt"></i></a>
                                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">فرآورده انتخاب شده حذف گردد؟</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">انصراف</button>
                                                                <form method="POST" action="{{route('product.destroy',$product->id)}}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    {{-- <input type="hidden" id="role_id" name="role_id" value=""> --}}
                                                                    <a class="btn btn-danger" onclick="$(this).closest('form').submit();">تایید</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            {{--                                            <a title="نمایش" href="/users/{{ $user['id'] }}"><i class="fa fa-eye"></i></a>--}}

                                                {{--                                        <a data-id="{{$product->id}}" data-toggle="modal"--}}
                                                {{--                                           data-target="#editproduct{{$product->id}}" title="ویرایش"--}}
                                                {{--                                           href="#"><i class="fa fa-edit"></i></a>--}}
                                            </td>
                                        </tr>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('product.create')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
{{--                    <h5 class="modal-title" id="exampleModalLabel">ایجاد فرآورده</h5>--}}
{{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <ul id="saveform_errlist"></ul>

                        <label for="name">{{__('product.name')}}</label><br>
                        <input  class="name" size="50px" name="name">
                        <br>


                        <label for="price">{{__('product.price')}}</label><br>
                        <input  class="price" name="price" >

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            <button   class="btn btn-primary btn-submit">{{__('create')}}</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
           $(document).on('click','.btn-submit',function (e){
               e.preventDefault();
               // console.log("hello");
               var data={
                   'name' :$('.name').val(),
                   'price' :$('.price').val(),
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

                           $('#success_message').addClass('alert alert-success')
                           $('#success_message').text(response.message)
                           $('#exampleModal').modal('hide');
                           $('#exampleModal').find('input').val("");
                       }
                   }
               });



           }) ;
        });
    </script>

@endsection
