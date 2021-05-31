<title>Carts</title>

@extends('layouts.pageapp')

<?php

   //echo $dt->format('F j, Y, g:i a');

   $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));

   $chm = $dt->format('Gi');
   $IntChm = (int)$chm;

   $t = $chm ."". $chm;
 //  $cmm = $dt->format('i');
  // $css = $dt->format('s');

 //  $aMpM = $dt->format('a');


 //  $IntCmm = (int)$cmm;

 //  $IntCss = (int)$css;

?>



<style>
.product-discount-label{
	display:block;
	padding:4px 15px 4px 30px;
	color:#fff;
	background-color:#0081c2e0;
	position:absolute;
	top:10px;
	right:0;
	-webkit-clip-path:polygon(34% 0,100% 0,100% 100%,0 100%);
	clip-path:polygon(34% 0,100% 0,100% 100%,0 100%);
	}




.title {
    margin-bottom: 5vh
}

.card {
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent
}

@media(max-width:767px) {
    .card {
        margin: 3vh auto
    }
}

.cart {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem
}

@media(max-width:767px) {
    .cart {
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem
    }
}

.summary {
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65)
}

@media(max-width:767px) {
    .summary {
        border-top-right-radius: unset;
        border-bottom-left-radius: 1rem
    }
}

.summary .col-2 {
    padding: 0
}

.summary .col-10 {
    padding: 0
}

.row {
    margin: 0
}

.title b {
    font-size: 1.5rem
}

.main {
    margin: 0;
    padding: 2vh 0;
    width: 100%
}

.col-2,
.col {
    padding: 0 1vh
}

a {
    padding: 0 1vh
}

.close {
    margin-left: auto;
    font-size: 0.7rem
}

img {
    width: 3.5rem
}

.back-to-shop {
    margin-top: 4.5rem
}

h5 {
    margin-top: 4vh
}

hr {
    margin-top: 1.25rem
}

form {
    padding: 2vh 0
}

select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

input:focus::-webkit-input-placeholder {
    color: transparent
}

.btn {
    background-color: #000;
    border-color: #000;
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0
}

.btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

.btn:hover {
    color: white
}

a {
    color: black
}

a:hover {
    color: black;
    text-decoration: none
}

#code {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}



</style>

@section('content')

<section class="ftco-section bg-light">
    	<div class="container"><br><br>

                    <div class="row justify-content-center  mb-3">
                                        <div class="card">
                                        <div class="row">
                                            <div class="col-md-8 cart">
                                                <div class="title">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4><b>Shopping Cart</b></h4>
                                                        </div>
                                                        <div class="col align-self-center text-right text-muted"></div>
                                                    </div>
                                                </div>

                                                <input type="text" name="product_id" value=""  hidden>




                                                <input type="text" id="c_id" value="{{Auth::user()->id}}" hidden/>



                                                   <div id="cart_div" class="table-responsive">
                                                       <table id="cartTable" class="table table-borderless">
                                                                <tbody >

                                                                </tbody>
                                                        </table>
                                                   </div>



                                                
                                            </div>
                                            <div class="col-md-4 summary">
                                                <div>
                                                    <h5><b>Summary</b></h5>
                                                </div>
                                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                                    <div  class="col text-right"> </div>
                                                </div>
                                                <form method="POST" action="{{ route('customer.checkOut') }}" enctype="multipart/form-data">
                                                @csrf
                                                    <input type="text" id="cs_id" value="{{$customers->id}}" hidden/>
                                                    <input type="text" id="p_vendor" value="{{$customers->id}}" hidden/>
                                                    <p>TOTAL PRICE <p class="text-success">(Including 60 taka delivery charge)</p></p>
                                                    <input id="total_amount" name="total_price" class="text" value="0" readonly type="text" /><br><br>

                                                    <p>PAYMENT</p>
                                                    <select name="PaymentWay">
                                                        <option class="text-muted">Cash-on-Delivery </option>
                                                        <option class="text-muted" >Bkash</option>
                                                        <option class="text-muted">Rocket</option>
                                                        <option class="text-muted">Nagad</option>
                                                    </select>

                                                    <input type="submit"  class="btn btn-warning float-right" value="CHECKOUT"/>

                                                </form>

                                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>

    	</div>
</section>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type='text/javascript'>



    function openPopup() {
        alert("dasda");
        $("#targetp").modal();
    }


    function amountUp(cart_id) {

    var id = cart_id;
    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
    url: "cart-up"+id,
    type: 'DELETE',
    data: {
    "id": id,
    "_token": token,
    },
    success: function (){

                $("#cartTable").load(" #cartTable");
                $.ajax({
                url: '/cart-data',
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                var len = response['data'].length;
                //alert(len);
                            var sum = 0;
                            for(var i=0; i<len; i++){
                                        var c_id = $( "#c_id" ).val();
                                        var db_c_id = response['data'][i].customer;

                                                if(c_id == db_c_id ){
                                                        var id = response['data'][i].id;
                                                        var p_img_1 = response['data'][i].p_img_1;
                                                        var p_name = response['data'][i].p_name;
                                                        var p_price = response['data'][i].p_price;
                                                        var amount = response['data'][i].amount;

                                                        sum += parseInt(response['data'][i].amount * response['data'][i].p_price);

                                                        var tr_str = "<tr>" +
                                                        "<td align='center'>    <div class='row border-top border-bottom'> <div class='row main align-items-center'> <div class='col-2'><img class='img-fluid' src='"+ p_img_1 +"'></div> <div class='col'> <div class='row text'>" + p_name + "</div> </div> <div class='col'>  <a href='#' class='border'> "+ amount +" </a></div>    <div class='col'> <a href='javascript:void(0);' onclick='amountDown("+id+");' ><i class='fa fa-minus'></i></a> <a href='javascript:void(0);' onclick='amountUp("+id+");' ><i class='fa fa-plus'></i></a>   </div>  <div class='col'>   <a href='javascript:void(0);' onclick='cartDelete("+id+");' ><i style='color: red;' class='fa fa-trash'></i></a>  <br><br>  &#2547; " + p_price * amount + "    </div>   </div> </div> </td>" +

                                                        "</tr>";

                                                        var t_amount = document.getElementById('total_amount');
                                                        t_amount.value = sum+60;

                                                            $("#cartTable tbody").append(tr_str);
                                                            }
                            }

                }

                });

    }
    });
    }




    function amountDown(cart_id) {

    var id = cart_id;
    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
    url: "cart-down"+id,
    type: 'DELETE',
    data: {
    "id": id,
    "_token": token,
    },
    success: function (){

                $("#cartTable").load(" #cartTable");
                $.ajax({
                url: '/cart-data',
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                var len = response['data'].length;
                //alert(len);
                            var sum = 0;
                            for(var i=0; i<len; i++){
                                        var c_id = $( "#c_id" ).val();
                                        var db_c_id = response['data'][i].customer;

                                                if(c_id == db_c_id ){
                                                        var id = response['data'][i].id;
                                                        var p_img_1 = response['data'][i].p_img_1;
                                                        var p_name = response['data'][i].p_name;
                                                        var p_price = response['data'][i].p_price;
                                                        var amount = response['data'][i].amount;

                                                        sum += parseInt(response['data'][i].amount * response['data'][i].p_price);

                                                        var tr_str = "<tr>" +
                                                        "<td align='center'>    <div class='row border-top border-bottom'> <div class='row main align-items-center'> <div class='col-2'><img class='img-fluid' src='"+ p_img_1 +"'></div> <div class='col'> <div class='row text'>" + p_name + "</div> </div> <div class='col'>  <a href='#' class='border'> "+ amount +" </a></div>    <div class='col'> <a href='javascript:void(0);' onclick='amountDown("+id+");' ><i class='fa fa-minus'></i></a> <a href='javascript:void(0);' onclick='amountUp("+id+");' ><i class='fa fa-plus'></i></a>   </div>  <div class='col'>   <a href='javascript:void(0);' onclick='cartDelete("+id+");' ><i style='color: red;' class='fa fa-trash'></i></a>  <br><br>  &#2547; " + p_price * amount + "    </div>   </div> </div> </td>" +

                                                        "</tr>";

                                                        var t_amount = document.getElementById('total_amount');
                                                        t_amount.value = sum+60;

                                                            $("#cartTable tbody").append(tr_str);
                                                            }
                            }

                }

                });

    }
    });
    }




    function cartDelete(cart_id) {

        var id = cart_id;
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
        url: "cart-delete"+id,
        type: 'DELETE',
        data: {
        "id": id,
        "_token": token,
        },
        success: function (){

                    $("#cartTable").load(" #cartTable");
                    $.ajax({
                    url: '/cart-data',
                    type: 'get',
                    dataType: 'JSON',
                    success: function(response){
                    var len = response['data'].length;
                    //alert(len);
                                var sum = 0;
                                for(var i=0; i<len; i++){
                                            var c_id = $( "#c_id" ).val();
                                            var db_c_id = response['data'][i].customer;

                                                    if(c_id == db_c_id ){
                                                            var id = response['data'][i].id;
                                                            var p_img_1 = response['data'][i].p_img_1;
                                                            var p_name = response['data'][i].p_name;
                                                            var p_price = response['data'][i].p_price;
                                                            var amount = response['data'][i].amount;

                                                            sum += parseInt(response['data'][i].amount * response['data'][i].p_price);

                                                            var tr_str = "<tr>" +
                                                            "<td align='center'>    <div class='row border-top border-bottom'> <div class='row main align-items-center'> <div class='col-2'><img class='img-fluid' src='"+ p_img_1 +"'></div> <div class='col'> <div class='row text'>" + p_name + "</div> </div> <div class='col'>  <a href='#' class='border'> "+ amount +" </a></div>    <div class='col'> <a href='javascript:void(0);' onclick='amountDown("+id+");' ><i class='fa fa-minus'></i></a> <a href='javascript:void(0);' onclick='amountUp("+id+");' ><i class='fa fa-plus'></i></a>   </div>  <div class='col'>   <a href='javascript:void(0);' onclick='cartDelete("+id+");' ><i style='color: red;' class='fa fa-trash'></i></a>  <br><br>  &#2547; " + p_price * amount + "    </div>   </div> </div> </td>" +

                                                            "</tr>";

                                                            var t_amount = document.getElementById('total_amount');
                                                            t_amount.value = sum+60;

                                                                $("#cartTable tbody").append(tr_str);
                                                                }
                                }

                    }

                    });

        }
        });
    }


    $(document).ready(function(){

        $.ajax({
        url: '/cart-data',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
        var len = response['data'].length;
        //alert(len);

                    var sum = 0;
                    for(var i=0; i<len; i++){
                                var c_id = $( "#c_id" ).val();
                                var db_c_id = response['data'][i].customer;

                                        if(c_id == db_c_id ){
                                                var id = response['data'][i].id;
                                                var p_img_1 = response['data'][i].p_img_1;
                                                var p_name = response['data'][i].p_name;
                                                var p_price = response['data'][i].p_price;
                                                var amount = response['data'][i].amount;


                                                sum += parseInt(response['data'][i].amount * response['data'][i].p_price);

                                                var tr_str = "<tr>" +
                                                    "<td align='center'>    <div class='row border-top border-bottom'> <div class='row main align-items-center'> <div class='col-2'><img class='img-fluid' src='"+ p_img_1 +"'></div> <div class='col'> <div class='row text'>" + p_name + "</div> </div> <div class='col'>  <a href='#' class='border'> "+ amount +" </a></div>    <div class='col'> <a href='javascript:void(0);' onclick='amountDown("+id+");' ><i class='fa fa-minus'></i></a> <a href='javascript:void(0);' onclick='amountUp("+id+");' ><i class='fa fa-plus'></i></a>   </div>  <div class='col'>   <a href='javascript:void(0);' onclick='cartDelete("+id+");' ><i style='color: red;' class='fa fa-trash'></i></a>  <br><br>  &#2547; " + p_price * amount + "    </div>   </div> </div> </td>" +

                                                    "</tr>";

                                                    var t_amount = document.getElementById('total_amount');
                                                    t_amount.value = sum+60;

                                                    $("#cartTable tbody").append(tr_str);
                                                    }
                    }

        }

        });

    });

</script>
