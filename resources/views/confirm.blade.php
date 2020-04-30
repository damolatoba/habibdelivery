@extends('layouts.fe')

@section('content')

    <div class="start">
        <div class="bgHeader">

        </div>
        <div class="cusBody">
            <a href="/"><img src='../../../images/Logo.png' class="cusLogo"/></a>
            <div class="cusForm">
                <p class="deltit"><span class="loclogo"><span class="glyphicon glyphicon-map-marker"></span></span> CONFIRM DELIVERY</p>
                <div>
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="recpur">RECEIVER</span>
                                <hr class="hrline5"/>
                                <span class="conname">{{$data['customer']['name']}}</span><br/>
                                <span class="coninf">{{$data['customer']['mobile']}}</span><br/>
                                <span class="coninf">{{$data['customer']['address']}}</span>
                            </div>
                            <div class="col-xs-6">
                                <span class="recpur">PURCHASE</span>
                                <hr class="hrline5"/>
                                    @if(count($data['cart']) > 0)
                                        @foreach($data['cart'] as $c)
                                            <div class="conprodall">
                                                <span class="conprod">{{$c['product_name']}}</span><br/>
                                                <span class="prodqp">Quantity: {{$c['quantity']}}</span>
                                                <span class="conprice">{{$c['total_cost']}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                <hr class="hrline5"/>
                                    <span class="prodqp2">Sub-Total</span>
                                    <span class="conprice2">300</span><br/>
                                    <span class="prodqp2">Delivery</span>
                                    <span class="conprice2">300</span>
                                <hr class="hrline5"/>
                                    <span class="prodqp2">Total</span>
                                    <span class="conprice2">3000</span>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="hidden" name="email" value="tobadamola@gmail.com"> {{-- required --}}
                                <input type="hidden" name="orderID" value="{{$data['customer']['transaction']}}">
                                <input type="hidden" name="amount" value="{{$data['customer']['duePayment']}}"> {{-- required in kobo --}}
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


                                <p>
                                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                     <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                </button>
                                </p>
                            </div>
                            </div>
                    </form>
            </div>
        
        </div>
    </div>
@endsection