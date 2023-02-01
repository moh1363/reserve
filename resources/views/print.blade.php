@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container" dir="rtl" style="font-family: 'B Yekan'" >
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('row') }}</div>

                    <div class="card-body">
                        <div>
                            <div style="text-align: center">
                                <h2>سامانه نوبت دهی انبار نفت شهید آنجفی</h2>
                            </div>
                            <div>
                            <h1 style="text-align: center">{{$loadrow->product_type}}</h1>
                            </div>
                            <div style="text-align: center">                            <h1>{{__('row')}} : {{$loadrow->row}}</h1><br> </div>
                            <h3>{{__('car.number')}} : {{$loadrow->car_number}}</h3><br>
                            <h3>{{__('driver.name')}} : {{$loadrow->driver_name}}</h3><br>
                            <h3>{{__('membership.number')}} : {{$loadrow->membership_number}}</h3><br>
                            <h3>{{__('issue.date')}}  : {{$loadrow->issue_date}}</h3><br>
                            <h3>مدت اعتبار قبض ..... روز از تاریخ صدور می باشد.</h3>


                        </div>
            </div>
        </div>
    </div>
        </div>
    </div>



<script type="text/javascript">
    window.onload = function() { window.print(); }

</script>
