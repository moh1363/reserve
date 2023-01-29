@extends('layouts.app')
@section('title')
{{__('row.list')}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'لیست' }}</div>

                    <div class="card-body">
                        @php
                            $i=1;
                        @endphp
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ردیف</th>
                                <th scope="col">شماره نفتکش</th>
                                <th scope="col">شماره بار نامه</th>
                                <th scope="col">نوع فرآورده</th>
                                <th scope="col">تاریخ صدور</th>
                                <th scope="col">نوبت</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reserves as $reserve)
                                <tr>

                                    <td scope="col">{{$i++}}</td>
                                    <td scope="col">{{$reserve->car_number}}</td>
                                    <td scope="col">{{$reserve->load_number}}</td>
                                    <td scope="col">{{$reserve->product_type}}</td>
                                    <td scope="col">{{$reserve->issue_date}}</td>
                                    <td scope="col">{{$reserve->row}}</td>
                                    <td scope="col">
                                        @if(($reserve->status)==0)
                                            {{'غیرفعال'}}
                                        @elseif(($reserve->status)==1)
                                            {{'فعال'}}
                                        @endif
                                    </td>
                                    <td><a target="_blank" title="چاپ مجدد" href="{{route('reserve.show',$reserve->id)}}"><i
                                                class="fa fa-print"></i> </a> </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{ $reserves->links('pagination::bootstrap-5')}}
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
