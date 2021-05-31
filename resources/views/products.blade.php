<title>Products</title>

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
</style>

@section('content')

<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center pb-5 mb-3">

				<div class="col-md-7 heading-section text-center ftco-animate">
					<h3>Shop Products</h3>
				</div>
				</div>
				
				<div class="row">	

                


				    @foreach($products->reverse() as $value_dt)

                       @if ($value_dt->shop == $id)
                            @if ($value_dt->p_status == "Accepted" && $value_dt->product )
                                        <div class="col-lg-4 col-md-6 mb-4">
                                          <input type="text" name="s_id" value="{{$value_dt->id}}" hidden>
                                            <div class="card h-100">
                                            <a href="ii"><img class="card-img-top" src="{{$value_dt->p_img_1}}" alt=""></a>               
                                        
                                            <div class="card-footer" style="background-color: #212529;">
                                                <small class="text-muted">{{$value_dt->p_name}} {{$value_dt->p_price}}  &#2547;     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </small>
                                            
                                            <div class="row justify-content-center">
                                             <form action="{{Route('customer.add_to_cart')}}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <input type="text" name="product" value="{{$value_dt->id}}" hidden>
                                              <input type="text" name="vendor" value="{{$value_dt->p_vendor}}" hidden>
                                              
                                                <br> <button class="btn btn-success">Add to Cart</button>
                                              </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                              @endif
                       @endif
                    





                    @endforeach

	      </div>
    	</div>
    </section>

@endsection