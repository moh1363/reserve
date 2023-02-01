@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container" dir="rtl" style="font-family: 'B Yekan'" >
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card" style="width: 200px">
                    <div class="card-header">{{ __('row') }}</div>

                    <div class="card-body">
                        <div>
                            <h3>{{__('car.number')}}</h3>
                            <h6>{{$loadrow->car_number}}</h6><br>

                            <h3>{{__('load.number')}}</h3>
                            <h6>{{$loadrow->load_number}}</h6><br>

                            <h3>{{__('product.type')}}</h3>
                            <h6>{{$loadrow->product_type}}</h6><br>

                            <h3>{{__('issue.date')}} </h3>
                            <h6>{{$loadrow->issue_date}}</h6><br>

                            <h3>{{__('driver.name')}} </h3>
                            <h6>{{$loadrow->driver_name}}</h6><br>

                            <h3>{{__('membership.number')}} </h3>
                            <h6>{{$loadrow->membership_number}}</h6><br>

                            <h3>{{__('row')}} </h3>
                            <h6>{{$loadrow->row}}</h6><br>
                        </div>
            </div>
        </div>
    </div>
        </div>
    </div>



<script type="text/javascript">
    window.onload = function() { window.print(); }

</script>
<script>
    setTimeout(function() {
        window.close()
    }, 5);
</script>
