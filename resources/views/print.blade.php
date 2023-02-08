@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container" dir="rtl" style="font-family: 'B Yekan'" >
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <div >
                            <div style="text-align: center">
                                <h1 >سامانه نوبت دهی انبار نفت شهید آنجفی</h1>
                            </div>
                            <div>
                            <h1 style="text-align: center">{{$loadrow->product_type}}</h1>
                            </div>
                            <div style="text-align: center">                            <h1>{{__('row')}} : {{$loadrow->row}}</h1><br> </div>
                            <h5>{{__('car.number')}} : {{$loadrow->car_number}}</h5><br>
                            <h5>{{__('driver.name')}} : {{$loadrow->driver_name}}</h5><br>
                            <h5>{{__('membership.number')}} : {{$loadrow->membership_number}}</h5><br>
                            <h5>{{__('issue.date')}}  : {{$loadrow->issue_date}}</h5><br>
                            <h5>مدت اعتبار قبض {{$loadrow->expire_date}} روز از تاریخ صدور می باشد.</h5>


                        </div>
            </div>
        </div>
    </div>
        </div>
    </div>



<script type="text/javascript">
    window.onload = function() { window.print();
        // window.location.assign("/")
    }

</script>

