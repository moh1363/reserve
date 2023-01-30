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


{{--                    <div class="form-group">--}}
{{--                                                <label for="car_number">شماره نفتکش :</label><br><br>--}}
{{--                    <div id="wb_Shape1" style="position:absolute;left:282px;top:80px;width:494px;height:73px;z-index:0;">--}}
{{--                        <img src="{{asset('images/img0001.png')}}" id="Shape1" alt="" width="494" height="73" style="width:494px;height:73px;"></div>--}}
{{--                    <input required maxlength="2"  minlength="2" name="twonumber" id="TextArea1" style="position:absolute;left:342px;top:100px;width:80px;height:34px;z-index:1;" rows="2" cols="7" spellcheck="false"></input>--}}
{{--                    <select name="city" size="1" id="Select1" style="position:absolute;left:675px;top:100px;width:70px;height:34px;z-index:2;">--}}
{{--                        @for ($x = 10; $x <= 99; $x++)--}}
{{--                        <option>{{$x}}</option>--}}
{{--                        @endfor--}}
{{--                    </select>--}}
{{--                    <input required maxlength="3" minlength="3" name="threenumber" id="TextArea2" style="position:absolute;left:530px;top:100px;width:115px;height:34px;z-index:3;" rows="1" cols="12" spellcheck="false"></input>--}}
{{--                    <div id="wb_Text1" style="position:absolute;left:680px;top:85px;width:70px;height:34px;z-index:4;">--}}
{{--                        <p name="country">ایران</p>--}}
{{--                        <p>&nbsp;</p></div>--}}
{{--                        <input size="4" style="border: none" name="country" value="ایران"></div>--}}
{{--                    <select name="alefba" size="1" id="Select2" style="position:absolute;left:440px;top:100px;width:81px;height:34px;z-index:5;">--}}
{{--                        <option>ب</option>--}}
{{--                        <option>ج</option>--}}
{{--                        <option>د</option>--}}
{{--                        <option>ژ</option>--}}
{{--                        <option>س</option>--}}
{{--                        <option>ص</option>--}}
{{--                        <option>ط</option>--}}
{{--                        <option>ق</option>--}}
{{--                        <option>ل</option>--}}
{{--                        <option>م</option>--}}
{{--                        <option>ن</option>--}}
{{--                        <option>و</option>--}}
{{--                        <option>ه</option>--}}
{{--                        <option>ی</option>--}}
{{--                        <option>الف</option>--}}
{{--                        <option>ت</option>--}}
{{--                        <option>ش</option>--}}
{{--                        <option>ک</option>--}}
{{--                        <option>گ</option>--}}
{{--                        <option>ع</option>--}}
{{--                        <option>پ</option>--}}
{{--                        <option>ث</option>--}}
{{--                        <option>ز</option>--}}
{{--                        <option>ف</option>--}}
{{--                    </select>--}}
{{--                    <div id="wb_Text2" style="position:absolute;left:295px;top:124px;width:70px;height:29px;z-index:6;">--}}
{{--                        <p>I.R</p>--}}
{{--                        <p>IRAN</p>--}}
{{--                        <p>&nbsp;</p></div>--}}
{{--                    <div id="wb_Image1" style="position:absolute;left:292px;top:97px;width:33px;height:19px;z-index:7;">--}}
{{--                        <img src="{{asset('images/Flag_of_Iran.svg.png')}}" id="Image1" alt="" width="33" height="19"></div>--}}
{{--                    <div id="wb_Line1" style="position:absolute;left:670px;top:76px;width:2px;height:73px;z-index:8;">--}}
{{--                        <img src="{{asset('images/img0002.png')}}" id="Line1" alt="" width="0" height="-73"></div>--}}
{{--                    <div id="wb_Line2" style="position:absolute;left:333px;top:76px;width:2px;height:73px;z-index:9;">--}}
{{--                        <img src="{{asset('images/img0004.png')}}" id="Line2" alt="" width="0" height="-73"></div></div>--}}
{{--<br><br><br><br>--}}

                    <div class="form-group">
                        <label for="car_number">شماره نفتکش :</label><br>
                        <select name="city" size="1" id="Select1">
                            @for ($x = 10; $x <= 99; $x++)
                                <option>{{$x}}</option>
                            @endfor
                        </select>
                        <input name="country" id="TextArea1"  value="ایران" readonly  >

                        <input name="threenumber" id="TextArea1" placeholder="سه رقم آخر پلاک" required maxlength="3" minlength="3">

                        <select name="alefba" size="1" id="Select2" >
                            <option>ب</option>
                            <option>ج</option>
                            <option>د</option>
                            <option>ژ</option>
                            <option>س</option>
                            <option>ص</option>
                            <option>ط</option>
                            <option>ق</option>
                            <option>ل</option>
                            <option>م</option>
                            <option>ن</option>
                            <option>و</option>
                            <option>ه</option>
                            <option>ی</option>
                            <option>الف</option>
                            <option>ت</option>
                            <option>ش</option>
                            <option>ک</option>
                            <option>گ</option>
                            <option>ع</option>
                            <option>پ</option>
                            <option>ث</option>
                            <option>ز</option>
                            <option>ف</option>
                        </select>
                        <input name="twonumber" id="TextArea1" placeholder="دو رقم اول پلاک" required maxlength="2"  minlength="2">

{{--                        <input name="car_number" type="text" class="form-control" id="car_number" aria-describedby="emailHelp"  >--}}
                    </div>
                    <div class="form-group">
                        <label for="load_number">{{__('load.number')}}</label>
                        <input  name="load_number" type="text" class="form-control" id="load_number" aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="product_type">{{__('product.type')}}</label>
                        <select  id="AddrType" name="product_type" class="form-select">
                            @foreach($products as $product)
                                <option id="naft1" value="{{$product->name}}">{{$product->name}} ( قیمت:{{$product->price}})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="membership_number">{{__('membership.number')}}</label>
                        <input name="membership_number" type="text" class="form-control" id="membership_number" aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="driver_name">{{__('driver.name')}}</label>
                        <input name="driver_name" type="text" class="form-control" id="driver_name" aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="issue_date">{{__('issue.date')}}</label>
                        <input name="issue_date" type="text" class="form-control" id="issue_date" value="{{verta()->format('Y/m/d')}}" readonly aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="tracking_number">{{__('tracking.number')}}</label>
                        <input name="tracking_number" type="text" class="form-control" id="tracking_number" aria-describedby="emailHelp"  >
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

        $(document).ready(function(){
            $('#AddrType').change(function(){
                if ($(this).val() == 'نفتگاز') {
                    $('#stateText').css({'display':'block'});
                }
            });
        });


    </script>
    <script>
        $(document).ready(function() {

            $("#gas1").onmouseover(function () {
                $("#gas").show();
            });
        });
    </script>
@endsection
