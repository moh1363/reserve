@extends('layouts.app')
@section('title')
    {{__('user.index')}}
@endsection
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

                        {{__('user.index')}}

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>{{__('row1')}}</th>
                                    <th>{{__('user.name')}}</th>
                                    <th>{{__('user.codemell')}}</th>
                                    <th>{{__('access')}}</th>
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
                                        <tr>

                                            <td>{{$i++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->codemelli}}</td>
                                            <td>
                                                @if($user->role==1)
                                                   {{__('admin')}}
                                                @elseif($user->role==2)
                                            {{__('operator')}}
                                                @endif</td>
                                            <td>

                                                <a data-id="{{$user->id}}" data-bs-toggle="modal"
                                                   data-bs-target="#edituser{{$user->id}}" title="{{__('edit')}}"
                                                   href="{{route('users.update',$user->id)}}"><i class="fa fa-edit"></i></a>

{{--                                                edit modal--}}
                                            <div class="modal fade" id="edituser{{$user->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{__('user.edit')}}</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('users.update',$user->id)}}" method="post">
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


                                                                <label for="name">{{__('user.name')}}</label><br>
                                                                <input required id="name" size="60px" name="name" value="{{$user->name}}">
                                                                <br>

                                                                <label for="codemelli">{{__('user.codemelli')}}</label><br>
                                                                <input minlength="10" maxlength="10" required id="price" name="codemelli" value="{{$user->codemelli}}">
                                                                <br>

                                                                <label for="role">{{__('user.role')}}</label><br>
                                                                <select name="role">
                                                                    <option value="1">{{__('user.admin')}}</option>
                                                                    <option value="2">{{__('user.operator')}}</option>
                                                                </select>
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

                                            @if(!(auth()->user()->id==$user->id) or auth()->user()->role==2)
                                                <a data-id="{{$user->id}}" data-bs-toggle="modal"
                                                   data-bs-target="#deleteuser{{$user->id}}" title="{{__('delete')}}"
                                                   href="{{route('users.destroy',$user->id)}}"><i class="fa fa-trash-alt"></i></a>
{{--                                                <a title="{{__('user.delete')}}" href="{{route('users.destroy',$user->id)}}" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="{{$user['id']}}"><i class="fas fa-trash-alt"></i></a>--}}
                                                <div class="modal fade" id="deleteuser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">{{__('user.delete')}}</h5>
                                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">کاربر انتخاب شده حذف گردد؟</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">انصراف</button>
                                                                <form method="POST" action="{{route('users.destroy',$user->id)}}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    {{-- <input type="hidden" id="role_id" name="role_id" value=""> --}}
                                                                    <a class="btn btn-danger" onclick="$(this).closest('form').submit();">تایید</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
@endif
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
                    <h5 class="modal-title" id="exampleModalLabel">{{__('user.create')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
{{--                    <h5 class="modal-title" id="exampleModalLabel">ایجاد فرآورده</h5>--}}
{{--                    <button style="float: left" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <form action="{{route('users.store')}}" method="post">
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

                            <label for="name">{{__('user.name')}}</label><br>
                            <input required  id="name" size="60px" name="name" >
                            <br>

                            <label for="codemelli">{{__('user.codemelli')}}</label><br>
                            <input minlength="10" maxlength="10" required id="price" name="codemelli" >
                            <br>

                            <label for="role">{{__('user.role')}}</label><br>
                            <select name="role">
                                <option value="1">{{__('user.admin')}}</option>
                                <option value="2">{{__('user.operator')}}</option>
                            </select>
{{--                            <input required id="price" name="role" >--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            <button type="submit" class="btn btn-primary">{{__('create')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
