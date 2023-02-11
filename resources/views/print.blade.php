<div style="font-family:Yekan;font-size: 20px" dir="rtl">
    <h6>سامانه نوبت دهی انبار نفت شهید آنجفی</h6>
    <h6>{{$loadrow->product_type}}</h6>
    <h6>{{__('row')}} : {{$loadrow->row}}</h6>
<h6>{{__('price')}} : {{$loadrow->product_price}} ریال</h6>
<h6>{{__('car.number')}} : {{$loadrow->car_number}}</h6>
<h6>{{__('driver.name')}} : {{$loadrow->driver_name}}</h6>
<h6>{{__('membership.number')}} : {{$loadrow->membership_number}}</h6>
<h6>{{__('issue.date')}} : {{$loadrow->issue_date}}</h6>
<h6>مدت اعتبار قبض {{$loadrow->expire_date}} روز از تاریخ صدور می باشد.</h6>
</div>


<script type="text/javascript">
    window.onload = function () {
        window.print();
        // window.location.assign("/")
    }

</script>

