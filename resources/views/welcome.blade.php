@extends('layouts.app')
@section('title')
{{__('home')}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">نوبت دهی</div>

                    <div class="card-body">
                        <div class="form-group">
                            <form   action="{{ route('reserve.search') }}" method="GET">
                                @csrf
                                <label for="car_number">شماره نفتکش :</label><br>
                                <select name="city" size="1" id="Select1">
                                    @for ($x = 10; $x <= 99; $x++)
                                        <option>{{$x}}</option>
                                    @endfor
                                </select>
                                <input name="country" id="TextArea1"  value="ایران" readonly  >

                                <input name="threenumber" id="TextArea1" placeholder="سه رقم آخر پلاک" required maxlength="3" minlength="3">

                                <select name="alefba" size="1" id="Select2">
                                    <option selected>ع</option>

                                </select>
                                <input name="twonumber" id="TextArea1" placeholder="دو رقم اول پلاک" required maxlength="2"  minlength="2"><br>

                                {{--                        <input name="car_number" type="text" class="form-control" id="car_number" aria-describedby="emailHelp"  >--}}
                               <br>
                                <div class="form-group">

                                <label for="product.type">{{__('product.type')}} :</label><br>
                                <select name="product" class="form-select-sm" aria-describedby="emailHelp">
                                   @foreach($products as $product)
                                   <option value="{{$product->name}}">{{$product->name}}

                                   </option>
                                   @endforeach
                               </select>
                                </div>
                                <br>
                                <div class="form-group">

                                <button type="submit" class="btn btn-info">{{__('inspect')}}</button>
                                    <div class="form-group">

                            </form>
                        </div>
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




@endsection
