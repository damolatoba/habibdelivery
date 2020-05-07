@extends('layouts.fe')

@section('content')

    <div class="start">
        <div class="bgHeader">

        </div>
        <div class="cusBody">
            <a href="/"><img src='../../../images/Logo.png' class="cusLogo"/></a>
            <div class="cusForm">
                <div class="thanks">
                    <p>THANK YOU FOR YOUR PURCHASE.</p>
                    <p>AN SMS WITH YOUR DELIVERY CODE WILL BE SENT TO YOU SHORTLY</p>
                </div>
                        
            </div>
        
        </div>
        <script>
        var filledCart = [];
        localStorage.setItem('filledCart', JSON.stringify(filledCart));
        </script>
    </div>
@endsection