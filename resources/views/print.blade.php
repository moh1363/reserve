<html>
<head>
    <link rel="stylesheet" href="{{asset('/fonts/Yekan.ttf')}}">
    <style>
        @font-face {
            font-family: 'yekan';
            src: url({{asset('fonts/yekan/BYekan.ttf')}}) format("truetype"),
            url({{asset('fonts/yekan/Yekan.eot')}}) format("eot"),
            url({{asset('fonts/yekan/Yekan.woff')}}) format("woff"),
            url({{asset('fonts/yekan/Yekan.svg')}}) format("svg");
        }

        p.yekan{
            font-family: yekan;
        }
    </style>



</head>

<body style="font-family:'yekan';font-size: 16px" dir="rtl">
<h6 style="margin-right: 16px;font-size:18px">سامانه نوبت دهی </h6>
<h6 style="margin-top:-20px;font-size:18px"> انبار نفت شهید آنجفی</h6>
<h6 style=" margin-top:-60px;margin-right: 16px;font-size: 40px;font-weight: bold">{{$loadrow->product_type}}</h6>
<div id="1" style="margin-top:-110px;font-size: 16px">
    <label>{{__('row')}} :</label>
    <em style="font-size:40px;font-weight: bold;"> {{$loadrow->row}}</em></div>
<div id="1" style="margin-top:-20px">
    <label style="font-size: 16px">{{__('price')}} : </label>
    <em style="font-size:40px;font-weight: bold;">{{$loadrow->product_price}} ریال</em></div>

<div id="1" style="margin-top:-20px">
    <label style="font-size: 16px">{{__('car.number')}} :</label>
    <em style="font-size:40px;font-weight: bold;">{{$loadrow->car_number}}</em></div>

<div id="1" style="margin-top:-20px">
    <lable style="font-size: 16px">{{__('driver.name')}} :</lable>
    <em style="font-size:40px;font-weight: bold;">{{$loadrow->driver_name}}</em></div>

<div id="1" style="margin-top:-20px">
    <lable style="font-size: 16px">{{__('membership.number')}} :</lable>
    <em style="font-size:40px;font-weight: bold;">{{$loadrow->membership_number}}</em></div>
<div id="1" style="margin-top:-20px">
    <lable style="font-size: 16px">{{__('issue.date')}} :</lable>
    <em style="font-size:40px;font-weight: bold;"> {{$loadrow->issue_date}}</em></div>
<div id="1" style="margin-top:-20px">
    <h6>مدت اعتبار قبض {{$loadrow->expire_date}} روز از تاریخ صدور می باشد.</h6></div>
</body>


<script type="text/javascript">
    window.onload = function () {
        window.print();
        // window.location.assign("/")
    }

</script>
</body>
</html>

