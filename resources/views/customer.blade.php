@extends('layouts.fe')

@section('content')

    <div class="start">
        <div class="bgHeader">

        </div>
        <div class="cusBody">
            <a href="/"><img src='../../../images/Logo.png' class="cusLogo"/></a>
            <div class="cusForm">
                <p class="deltit"><span class="loclogo"><span class="glyphicon glyphicon-map-marker"></span></span> ENTER DELIVERY INFORMATION</p>
                <form action="/transact" method="POST">
                    @csrf
                    <input type="text" name="name" id="cusname" placeholder="RECEIVER'S NAME" />
                    <input type="text" name="mobile" id="cusmobile" placeholder="RECEIVER'S PHONE" />
                    <input type="text" name="address" id="cusaddress" placeholder="RECEIVER'S ADDRESS" />
                    <input type="hidden" name="branch" id="branch" />
                    <input type="hidden" name="cart" id="cart" />
                    <input type="image" src='../../../images/Probutton.png' class="probb"/>

                </form>
            </div>
        
        </div>
        <script>
            var customerName = JSON.parse(localStorage.getItem('customerName'));
            var customerMobile = JSON.parse(localStorage.getItem('customerMobile'));
            var customerAddress = JSON.parse(localStorage.getItem('customerAddress'));
            var filledCart = localStorage.getItem('filledCart');
            var SelectedBranch = localStorage.getItem('SelectedBranch');
            // console.log(SelectedBranch);
            $('#cusname').val(customerName);
            $('#cusmobile').val(customerMobile);
            $('#cusaddress').val(customerAddress);
            $('#branch').val(SelectedBranch);
            $('#cart').val(filledCart);

            $('#cusname').keyup(function() {
                var cusname = this.value;
                localStorage.setItem('customerName', JSON.stringify(cusname));
            });
            $('#cusmobile').keyup(function() {
                var cusmobile = this.value;
                localStorage.setItem('customerMobile', JSON.stringify(cusmobile));
            });
            $('#cusaddress').keyup(function() {
                var cusaddress = this.value;
                localStorage.setItem('customerAddress', JSON.stringify(cusaddress));
            });
        </script>
    </div>
@endsection