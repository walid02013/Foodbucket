<title>Restaurants</title>

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

				<div class="col-md-7 heading-section text-center">
					<h3 style="color: black;">Our Restaurants</h3>
				</div>
				</div>
				
				<div class="row">	

                


				    @foreach($shops->reverse() as $value_dt)

                       @if ($value_dt->open_mm < 10)
                           <?php $open = $value_dt->open_hh ."0". $value_dt->open_mm; ?>
                       @endif

                       @if ($value_dt->close_mm < 10)
                           <?php $close = $value_dt->close_hh ."0". $value_dt->close_mm; ?>
                       @endif

                       @if ($value_dt->open_mm >= 10)
                           <?php $open = $value_dt->open_hh ."". $value_dt->open_mm; ?>
                       @endif

                       @if ($value_dt->close_mm >= 10)
                           <?php $close = $value_dt->close_hh ."". $value_dt->close_mm; ?>
                       @endif
                    

                        @if ($open <= $IntChm && $close > $IntChm)

                                    @if ($value_dt->category == 4 && $value_dt->s_status == "Accepted" && $value_dt->shop )

                                        <div class="col-lg-4 col-md-6 mb-4">
                                          <input type="text" name="s_id" value="{{$value_dt->id}}" hidden>
                                            <div class="card h-100">
                                            @if($value_dt->s_discount)
                                            <span class="product-discount-label">{{$value_dt->s_discount}}% OFF</span>
                                            @endif
                                            <a href="{{ route('customer.productsGet',$value_dt->id) }}"><img class="card-img-top" src="{{$value_dt->s_banner}}" alt=""></a>								
                                        
                                            <div class="card-footer" style="background-color: #212529;">
                                                <small class="text-muted">{{$value_dt->s_name}} Open: <?php echo $value_dt->open_hh; ?>-<?php echo $value_dt->open_mm; ?> Close: <?php echo $value_dt->close_hh; ?>-<?php echo $value_dt->close_mm; ?>   </small>
                                            </div>
                                            </div>
                                        </div>
                                    @endif	
                        @endif



                        @if ($open >= $IntChm && $close > $IntChm)

                               @if ($value_dt->category == 4 && $value_dt->s_status == "Accepted" && $value_dt->shop ) 

                                <div class="col-lg-4 col-md-6 mb-4">
                                <input type="text" name="s_id" value="{{$value_dt->id}}" hidden>
                                    <div class="card h-100">
                                    @if($value_dt->s_discount)
                                    <span class="product-discount-label">{{$value_dt->s_discount}}% OFF</span>
                                    @endif
                                    <a href="{{ route('customer.productsGet',$value_dt->id) }}"><img class="card-img-top" src="{{$value_dt->s_banner}}" alt=""></a>								

                                    <div class="card-footer" style="background-color: #212529;">
                                        <small class="text-muted">{{$value_dt->s_name}} Open: <?php echo $value_dt->open_hh; ?>-<?php echo $value_dt->open_mm; ?> Close: <?php echo $value_dt->close_hh; ?>-<?php echo $value_dt->close_mm; ?>   </small>
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