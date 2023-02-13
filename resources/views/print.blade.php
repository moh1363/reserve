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

<body style="font-family:'yekan';font-size: 16px;width: 300px" dir="rtl" >
<h6 style="font-size:18px;text-align: center">سامانه نوبت دهی </h6>
<h6 style="font-size:18px;margin-top: -30px;text-align: center"> انبار نفت شهید آنجفی</h6>
<h6 style=" margin-right: 16px;margin-top: -30px;font-size: 30px;font-weight: bold;text-align: center">{{$loadrow->product_type}}</h6>
<div  style="padding-right: 46px;">

<div id="1" style="font-size: 16px;margin-top: -80px">
    <label>{{__('row')}} :</label>
    <em style="font-size:30px;font-weight: bold;"> {{$loadrow->row}}</em></div>
<div id="1" >
    <label style="font-size: 16px">{{__('price')}} : </label>
    <em style="font-size:16px;font-weight: bold;">{{$loadrow->product_price}} ریال</em></div>

<div id="1" >
    <label style="font-size: 16px">{{__('car.number')}} :</label>
    <em style="font-size:16px;font-weight: bold;">{{$loadrow->car_number}}</em></div>

<div id="1" >
    <lable style="font-size: 16px">{{__('driver.name')}} :</lable>
    <em style="font-size:16px;font-weight: bold;">{{$loadrow->driver_name}}</em></div>

<div id="1" >
    <lable style="font-size: 16px">{{__('membership.number')}} :</lable>
    <em style="font-size:16px;font-weight: bold;">{{$loadrow->membership_number}}</em></div>
<div id="1" >
    <lable style="font-size: 16px">{{__('issue.date')}} :</lable>
    <em style="font-size:16px;font-weight: bold;" dir="ltr" > {{$loadrow->issue_date}}</em></div>
<div id="1" style="margin-top: -30px">
    <h6 style="font-weight: bold;font-size: 13px">مدت اعتبار قبض {{$loadrow->expire_date}} روز از تاریخ صدور می باشد.</h6></div>
</div>
</body>


<script type="text/javascript">
    window.onload = function () {
        window.print();
        // window.location.assign("/")
    }

</script>
</body>
</html>

