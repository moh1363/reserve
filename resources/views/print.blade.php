@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<style>
    h3{
        border: solid;
    }
</style>
<div class="container" dir="rtl" style="font-family: 'B Yekan'">
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div>
                            <h3>شماره ماشین : </h3>
                            <h3>{{$loadrow->car_number}}</h3><br>

                            <h3>شماره بارنامه : </h3>
                            <h3>{{$loadrow->load_number}}</h3><br>

                            <h3>نوع فرآورده : </h3>
                            <h3>{{$loadrow->product_type}}</h3><br>

                            <h3>تاریخ صدور : </h3>
                            <h3>{{$loadrow->issue_date}}</h3><br>

                            <h3>شماره نوبت : </h3>
                            <h3>{{$loadrow->row}}</h3><br>
                        </div>
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
