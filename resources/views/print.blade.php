<div style="font-family:'Yekan';font-size: 20px" dir="rtl" xmlns="http://www.w3.org/1999/html">
    <h6 style="margin-right: 20px;font-size:22px">سامانه نوبت دهی </h6>
<h6 style="margin-top:-40px;font-size:22px">        انبار نفت شهید آنجفی</h6>
    <h6 style=" margin-top:-45px;margin-right: 20px;font-size: 40px;font-weight: bold">{{$loadrow->product_type}}</h6>
    <div style="margin-top:-90px;font-size: 20px">
        <label >{{__('row')}} :</label>
        <em style="font-size:35px;font-weight: bold;"> {{$loadrow->row}}</em></div>
<label style="font-size: 20px">{{__('price')}} : </label>
    <em style="font-size:35px;font-weight: bold;">{{$loadrow->product_price}} ریال</em><br>
    <label style="font-size: 20px">{{__('car.number')}} :</label>
    <em style="font-size:30px;font-weight: bold;">{{$loadrow->car_number}}</em><br>
    <lable style="font-size: 20px" >{{__('driver.name')}} : </lable>
    <em style="font-size:30px;font-weight: bold;">{{$loadrow->driver_name}}</em><br>
    <lable style="font-size: 20px">{{__('membership.number')}} : </lable>
    <em style="font-size:30px;font-weight: bold;">{{$loadrow->membership_number}}</em><br>
    <lable style="font-size: 20px" >{{__('issue.date')}} : </lable>
    <em style="font-size:30px;font-weight: bold;"> {{$loadrow->issue_date}}</em><br>
<h6>مدت اعتبار قبض {{$loadrow->expire_date}} روز از تاریخ صدور می باشد.</h6>
</div>


<script type="text/javascript">
    window.onload = function () {
        window.print();
        // window.location.assign("/")
    }

</script>

