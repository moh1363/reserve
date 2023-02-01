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
                                           @if($items)value="{{$items->car_number}}@endif">
                                @else
                                    <input style="font-size: 20px" name="car_number" readonly type="text"
                                          value="{{$q2}}">
                            @endif
                            </div>


{{--                                @else--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="car_number">شماره نفتکش :</label><br>--}}

{{--                                    <select name="city" size="1" id="Select1">--}}
{{--                                        @for ($x = 10; $x <= 99; $x++)--}}
{{--                                            <option>{{$x}} </option>--}}
{{--                                        @endfor--}}
{{--                                    </select>--}}
{{--                                    <input name="country" id="TextArea1" value="ایران" readonly>--}}

{{--                                    <input name="threenumber" id="TextArea1" placeholder="سه رقم آخر پلاک" required--}}
{{--                                           maxlength="3" minlength="3">--}}

{{--                                    <select name="alefba" size="1" id="Select2">--}}
{{--                                        <option selected>ع</option>--}}

{{--                                    </select>--}}
{{--                                    <input name="twonumber" id="TextArea1" placeholder="دو رقم اول پلاک" required--}}
{{--                                           maxlength="2" minlength="2">--}}


{{--                                </div>--}}
{{--                                @endif--}}
                                <div class="form-group">
                                    <label for="load_number">{{__('load.number')}}</label>
                                    <input minlength="8" maxlength="8" name="load_number" type="text"
                                           class="form-control" id="load_number" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="product_type">{{__('product.type')}}</label>
                                    <select id="AddrType" name="product_type" class="form-select">
                                        @foreach($products as $product)
                                            <option id="naft1" value="{{$product->name}}">{{$product->name}} (
                                                {{__('product.price')}}:{{$product->price}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="membership_number">{{__('membership.number')}}</label>
                                    <input name="membership_number" type="text" class="form-control"
                                           id="membership_number" aria-describedby="emailHelp"
                                           @if($items)value="{{$items->membership_number}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="driver_name">{{__('driver.name')}}</label>
                                    <input name="driver_name" type="text" class="form-control" id="driver_name"
                                           aria-describedby="emailHelp"
                                           @if($items)value="{{$items->driver_name}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="issue_date">{{__('issue.date')}}</label>
                                    <input name="issue_date" type="text" class="form-control" id="issue_date"
                                           value="{{verta()->format('Y/m/d')}}" readonly aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="tracking_number">{{__('tracking.number')}}</label>
                                    <input name="tracking_number" type="text" class="form-control" id="tracking_number"
                                           aria-describedby="emailHelp">
                                </div>
                                <br>
                                <button target="_blank" type="submit" class="btn btn-primary">{{__('reg')}}</button>

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
