@extends('layouts.app')
@section('title')
    {{__('home')}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">نوبت دهی</div>

                    <div class="card-body">
                        <form action="{{ route('reserve.search') }}" method="GET">
                            @csrf
                            <div class="container">
                                <label for="car_number">شماره نفتکش :</label><br><br>
                                <div class="license-plate">

                                    <div class="blue-column">
                                        <div class="flag">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="text">
                                            <div>I.R.</div>
                                            <div>IRAN</div>
                                        </div>
                                    </div>


                                    <span>
      <input size="3" class="plate" placeholder=" _ _" name="twonumber" maxlength="2" minlength="2" required>
    </span>
                                    <span class="alphabet-column">
      <input size="1" class="plate" value="ع" style="margin-left: 3px" name="alefba">
    </span>
                                    <span>
      <input size="2" class="plate" placeholder="_ _ _" style="margin-left: 20px" name="threenumber" maxlength="3" minlength="3" required>
    </span>
                                    <input name="country" style="text-align: center" size="10" id="TextArea1"
                                           value="ایران" hidden>

                                    <div class="iran-column">
                                        <span>ایــران</span>
                                        <strong><input name="city" size="2" class="plate" style=" margin-top: 5px"
                                                       placeholder=" _ _" maxlength="2" minlength="2" required></strong>
                                    </div>

                                </div>
                                <br>
                                <br>

                                <div class="form-group">

                                    <label for="product.type">{{__('product.type')}} :</label><br><br>
                                    <select name="product" class="form-select-sm" aria-describedby="emailHelp">
                                        @foreach($products as $product)
                                            <option value="{{$product->name}}">{{$product->name}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="form-group"><br>

                                    <button type="submit" class="btn btn-info">{{__('inspect')}}</button>
                                    <div class="form-group">
                                    </div></div>
                            </div>
                        </form>
                                    </div>

@endsection
