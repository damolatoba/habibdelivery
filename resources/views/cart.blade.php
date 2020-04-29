@extends('layouts.fe')

@section('content')
    <div class="prodbg">

            <div class="headpart">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8"><h5 class="prodTitle"><span class="glyphicon glyphicon-chevron-left"></span>HABIB<span class="deliver">DELIVERY</span></h5></div>
                    <div class="col-xs-4"><a href="/products"><p class="cartlogo2">Continue Shopping <span class="glyphicon glyphicon-shopping-cart cartSize"></span></p></a></div>
                    </div>
                </div> 
                <hr class="hrline"/>
            </div>

            <div class="bodypart">
                <div class="cartCont">
                        <p class="prodTitle2">MY CART</p>
                    <div class="cartitems" id="cartitems"></div>
                </div>

                <div class="totpart">
                    <span><span class="tottitle">Total: </span>
                    <p class="amount">&#8358;<span id="amount"></span></p></span><br/><br/>
                    <p class="shipinf pull-right">Shipping fees not included yet</p>
                    <button type="button" class="btn btn-success butsize" onclick="window.location.href = '/customer';">CHECKOUT</button>
                    <button type="button" class="btn btn-warning butsize">CANCEL ORDER</button>
                </div>
            </div>
    </div>
    <script>

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        var cart = [];
        const filledCart = JSON.parse(localStorage.getItem('filledCart'));
        if(filledCart != null){
            cart = filledCart;
        }
        var totcost = 0;
        var cartdiv = $(".cartitems");
        var wrapper = document.createElement("DIV");
        wrapper.className = "cartitems";
        var i;
        for (i = 0; i < cart.length; ++i) {
            totcost += cart[i].units * cart[i].prize;
            wrapper.innerHTML += '<div class="prodInCart"><div class="container cont"><div class="row"><div class="col-xs-4"><img src="/uploads/images/'+cart[i].img+'" class="itemImg"/></div><div class="col-xs-8 itemspad"><span class="itemSize">' +cart[i].name+ '</span><br/><span class="itemDesc">' +cart[i].desc +'</span><br/><span class="itemPrice">&#8358;' + formatNumber(cart[i].prize) + '</span></div></div><hr class="hrline3"/><div class="row"><div class="col-xs-6 deldiv"><span class="delProd" data-id="' +cart[i].id+ '" data-units="' +cart[i].units+ '" data-prize="' +cart[i].prize+ '"><span class="delbut"><span class="glyphicon glyphicon-trash"></span></span> Remove</span></div><div class="col-xs-6 deldiv2"><span class="itemCount"><span class="subProd" data-id="' +cart[i].id+ '" data-units="' +cart[i].units+ '" data-prize="' +cart[i].prize+ '"><span class="glyphicon glyphicon-minus-sign"></span></span>&nbsp; &nbsp; <span class="eachUnit" id="' +cart[i].id+ '">' +cart[i].units+ '</span> &nbsp; &nbsp;<span class="addProd" data-id="' +cart[i].id+ '" data-units="' +cart[i].units+ '" data-prize="' +cart[i].prize+ '"><span class="glyphicon glyphicon-plus-sign"></span></span></span></div></div></div></div>';
        }

        $("#amount").text(formatNumber(totcost));

        cartdiv.replaceWith(wrapper);





        $(".delProd").on("click", function(){
            var dataId = $(this).attr("data-id");
            var dataUnits = $(this).attr("data-units");
            var dataPrize = $(this).attr("data-prize");
            var subtotal = dataUnits*dataPrize;
            totcost -= subtotal;
            index = cart.findIndex(x => x.id === dataId);
            const cartProducts = cart.slice();
            cartProducts.splice(index, 1);
            cart = cartProducts;
            localStorage.setItem("filledCart", JSON.stringify(cart));
            $("#amount").text(formatNumber(totcost));
            $(this).closest("div.prodInCart").remove();
        });

        $(".subProd").on("click", function(){
            var dataId = $(this).attr("data-id");
            var dataUnits = $(this).attr("data-units");
            var dataPrize = $(this).attr("data-prize");
            dataUnits = dataUnits - 1;
            const delspan = '#'+dataId;
            totcost = totcost-dataPrize;

            index = cart.findIndex(x => x.id === dataId);
            cart[index].units = dataUnits;
            localStorage.setItem("filledCart", JSON.stringify(cart));

            $("#amount").text(formatNumber(totcost));
            $(delspan).text(dataUnits);
            console.log($(this).attr("data-units"));
        });

    </script>
@endsection