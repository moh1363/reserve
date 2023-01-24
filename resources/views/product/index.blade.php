@extends('layouts.app')

@section('content')





    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <button style="float: left" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>

                        مدیریت فرآورده ها
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام فرآورده</th>
                                    <th>قیمت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(count($products)==0)
                                    <tr>
                                        داده ای برای نمایش وجد ندارد
                                    </tr>
                                @else
                                    @foreach($products as $product)
                                        <tr>
                                            @php
                                                $i=1;
                                            @endphp
                                            <td>{{$i++}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>

                                                <a href=""data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal1">
                                                    <i class="fa fa-edit" aria-hidden="true"></i></a>


                                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">ایجاد چشم انداز</h5>
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
                                                                <label for="name">نام فرآورده</label><br>

                                                                <input required id="name" size="60px" name="name" value="{{$product->name}}">
                                                                <br>
                                                                <label for="price">قیمت</label><br>

                                                                <input required id="price" name="price" value="{{$product->price}}">
                                                                {{--                        <button size="5" type="submit">ایجاد</button>--}}

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                                                    <button type="submit" class="btn btn-primary">ویرایش</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                                <a title="حذف" href="" data-bs-toggle="modal" data-bs-target="#deleteModal" data-productid="{{$product['id']}}"><i class="fas fa-trash-alt"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">ایجاد چشم انداز</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
{{--                    <h5 class="modal-title" id="exampleModalLabel">ایجاد فرآورده</h5>--}}
{{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <form action="{{route('product.store')}}" method="post">
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
                        <label for="name">نام فرآورده</label><br>

                        <input required id="name" size="60px" name="name">
                        <br>
                        <label for="price">قیمت</label><br>

                        <input required id="price" name="price" data-jdp>
                        {{--                        <button size="5" type="submit">ایجاد</button>--}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            <button type="submit" class="btn btn-primary">ایجاد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
