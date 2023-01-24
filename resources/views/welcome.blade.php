@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

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
                        <label for="شماره نفتکش :">car_number</label><br>
                        <select name="city" size="1" id="Select1">
                            @for ($x = 10; $x <= 99; $x++)
                                <option>{{$x}}</option>
                            @endfor
                        </select>
                        <input name="country" id="TextArea1"  value="ایران" readonly  >

                        <input name="threenumber" id="TextArea1" placeholder="سه رقم آخر پلاک" required>

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
                        <input name="twonumber" id="TextArea1" placeholder="دو رقم اول پلاک" required >

{{--                        <input name="car_number" type="text" class="form-control" id="car_number" aria-describedby="emailHelp"  >--}}
                    </div>
                    <div class="form-group">
                        <label for="شماره بارنامه :">load_number</label>
                        <input name="load_number" type="text" class="form-control" id="load_number" aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="product_type">نوع فرآورده</label>
                        <select name="product_type" class="form-control">
                            @foreach($products as $product)
                                <option id="naft1" value="{{$product->name}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_type" id="naft" style="display: none">50/000/000 ریال</label>
                        <label hidden for="product_type" id="gas" style="display: none">50/000/000 ریال</label>
                        <label hidden for="product_type" id="naft-gas" style="display: none">50/000/000 ریال</label>

                    </div>
                    <div class="form-group">
                        <label for="membership_number">شماره عضویت :</label>
                        <input name="membership_number" type="text" class="form-control" id="membership_number" aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="driver_name">نام راننده :</label>
                        <input name="driver_name" type="text" class="form-control" id="driver_name" aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="issue_date">تاریخ صدور:</label>
                        <input name="issue_date" type="text" class="form-control" id="issue_date" value="{{verta()->format('Y/m/d')}}" readonly aria-describedby="emailHelp"  >
                    </div>
                    <div class="form-group">
                        <label for="tracking_number">شماره پیگیری تراکنش :</label>
                        <input name="tracking_number" type="text" class="form-control" id="tracking_number" aria-describedby="emailHelp"  >
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </form>

            </div>
        </div>
    </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $("#gas1").onmouseover(function () {
                $("#gas").show();
            });
        });
    </script>
@endsection
