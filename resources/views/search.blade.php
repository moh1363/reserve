@extends('layouts.app')
@section('title')
    {{__('home')}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">نوبت دهی</div>

                    <div class="card-body">
                        <form method="post" action="{{route('row.store')}}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <div class="form-group">
                                    <label for="car_number">شماره نفتکش :</label><br>
                                @if($items)

                                <input style="font-size: 20px" name="car_number" readonly type="text"
                                           @if($items)value="{{$items->car_number}}@endif" class="form-control" aria-describedby="emailHelp">
                                @else
                                    <input style="font-size: 20px" name="car_number" readonly type="text"
                                          value="{{$q2}}" class="form-control" aria-describedby="emailHelp">
                            @endif
                            </div>

                                <div class="form-group">
                                    <label for="product_type">{{__('product.type')}}</label>
                                   <input name="product_type" value="{{$items1->name}}" readonly class="form-control" aria-describedby="emailHelp">
                                </div>
                            <div class="form-group">
                                <label for="product_price">{{__('product.price')}}</label>
                                <input name="product_price" value="{{$items1->price}}" readonly class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="product_price">{{__('product.expire')}}</label>
                                <input name="expire_date" value="{{$items1->expire_date}}" readonly class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="issue_date">{{__('issue.date')}}</label>
                                <input name="issue_date" type="text" class="form-control" id="issue_date"
                                       value="{{verta()->format('Y/m/d')}}" readonly aria-describedby="emailHelp">
                            </div>
                                <div class="form-group">
                                    <label for="membership_number">{{__('membership.number')}}</label>
                                    <input name="membership_number" type="text" class="form-control"
                                           id="membership_number" aria-describedby="emailHelp"
                                           @if($items)value="{{$items->membership_number}}@endif" value="{{old('membership_number')}}">
                                </div>
                                <div class="form-group">
                                    <label for="driver_name">{{__('driver.name')}}</label>
                                    <input name="driver_name" type="text" class="form-control" id="driver_name"
                                           aria-describedby="emailHelp"
                                           @if($items)value="{{$items->driver_name}}@endif" value="{{old('driver_name')}}">
                                </div>
                            <div class="form-group">
                                <label for="load_number">{{__('load.number')}}</label>
                                <input name="load_number" minlength="8" maxlength="8" class="form-control" aria-describedby="emailHelp" value="{{old('load_number')}}">
                            </div>
                                <div class="form-group">
                                    <label for="tracking_number">{{__('tracking.number')}}</label>
                                    <input name="tracking_number" type="text" class="form-control" id="tracking_number"
                                           aria-describedby="emailHelp" value="{{old('tracking_number')}}" >
                                </div>
                                <br>
                                <button  type="submit" class="btn btn-primary">{{__('reg')}}</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>

        $(document).ready(function () {
            $('#AddrType').change(function () {
                if ($(this).val() == 'نفتگاز') {
                    $('#stateText').css({'display': 'block'});
                }
            });
        });


    </script>
    <script>
        $(document).ready(function () {

            $("#gas1").onmouseover(function () {
                $("#gas").show();
            });
        });
    </script>
@endsection
