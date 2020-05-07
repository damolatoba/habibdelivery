@extends('layouts.fe')

@section('content')
    <div class="prodbg">

        <div class="headpart">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8"><h5 class="prodTitle"><span class="glyphicon glyphicon-chevron-left"></span>HABIB<span class="deliver">DELIVERY</span></h5></div>
                    <div class="col-xs-4"><a href="/cart"><h5 class="cartlogo"><span class="glyphicon glyphicon-shopping-cart"><span class="totProd"></span></span></h5></a></div>
                </div>
            </div> 
                <hr class="hrline"/>
        </div>
        <div class="bodypart">
            <div class="mainProdBody">
                    <div class="imgdiv"><a href="/products"><img src='../../../images/Button1.png' class="specbut"/></a></div>
                    <div class="imgdiv2"><a href="/specials"><img src='../../../images/Button2.png' class="specbut"/></a></div>
                <div class="hbprods">
                @if (count($products)>0)
                    @foreach ($products as $p)
                    <div class="eachprod">
                        <div class="prodItem">
                        <img src="{{url('')}}/uploads/images/{{ $p->product_image }}" class="itemImg"/>
                            <div class="itemInfo">
                                <p class="itemSize">{{$p->product_name}}</p>
                                <span class="itemDesc">{{$p->description}}</span>
                                <div class="prizeRow">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <p class="itemPrice">&#8358;{{number_format($p->product_prize)}}</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="addToCart" data-id='{{$p->id}}' data-name='{{$p->product_name}}' data-desc='{{$p->description}}' data-image='{{$p->product_image}}' data-prize='{{$p->product_prize}}' onclick="addToCart($p->id}})"><span class="glyphicon glyphicon-plus-sign"></span></p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div>
                        <p>No products available at the moment.</p>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        var cart = [];
        const filledCart = JSON.parse(localStorage.getItem('filledCart'));
            if(filledCart != null){
                cart = filledCart;
            }
            var itemsCount = 0;
            for (i = 0; i < cart.length; ++i) {
                itemsCount = itemsCount + cart[i].units;
            }
            var theCount = $(".totProd");
            theCount.text(itemsCount);

            $(".addToCart").on("click", function(){
                var dataId = $(this).attr("data-id");
                var dataName = $(this).attr("data-name");
                var dataDesc = $(this).attr("data-desc");
                var dataImg = $(this).attr("data-image");
                var dataPrize = $(this).attr("data-prize");
                var items = {id:dataId, name:dataName, desc:dataDesc, img:dataImg, prize:dataPrize, units:1};


                index = cart.findIndex(x => x.id === dataId);

                if(index === -1){
                    cart.push(items);
                    itemsCount ++;
                    theCount.text(itemsCount);
                    localStorage.setItem("filledCart", JSON.stringify(cart));
                }else{
                    cart[index].units ++;
                    itemsCount ++;
                    theCount.text(itemsCount);
                    localStorage.setItem("filledCart", JSON.stringify(cart));
                }
            });

    </script>
@endsection