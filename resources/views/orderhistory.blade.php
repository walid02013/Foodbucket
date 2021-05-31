<title>Order History</title>

@extends('layouts.pageapp')

@section('content')


<section class="ftco-section bg-light">
<div class="container">


<!--Bookings-->
		<div class="row justify-content-center pb-5 mb-3 ">

		<div class="col-md-12 heading-section text-center ftco-animate">
			<h3>Oder History!</h3>
		</div>
		</div>

		<div class="row">

		@foreach($orders->reverse() as $value)

					@if ($value->customer_email == Auth::user()->email )





								        <div class="col-lg-4 col-md-6 mb-4" >

												<div class="card text-center">
												<div class="card-header">
													Order: #{{$value->id}}
												</div>
												<div class="card-body">
												    <h5 class="card-title">Total Price: {{$value->total_price}} ৳</h5>


													@foreach($products->reverse() as $p_value)



													@foreach($order_product->reverse() as $op_value)

													@if ($value->id == $op_value->order_id)
													   @if ($p_value->id == $op_value->product_id)
															<h5 class="card-title">{{$p_value->p_name}}</h5>
															<h5 class="card-title">৳: {{$p_value->p_price}}</h5>
															<h5 class="card-title">Q: {{$op_value->amount}}</h5>
														@endif
													@endif

													@endforeach


					                                @endforeach
													<h5 class="card-title">{{$value->payment_way}}</h5>
													<h5 class="card-title">{{$value->order_status}}</h5>


												</div>
												<div class="card-footer text-muted">
													Order Palce at: {{$value->created_at}}
												</div>
												</div>
										</div>





					@endif

		@endforeach

		</div>

		<br><br>
<!--End Bookings-->


	</div>


    </section>

@endsection
