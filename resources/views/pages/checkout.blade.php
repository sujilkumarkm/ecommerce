@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">
<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Checkout</div>
						<div class="cart_items">
							<ul class="cart_list">
								@foreach($cart as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image text-center"><br><br><img src="{{ asset($row->options->image) }}" alt="" style="widows: 70px; width: 70px;"></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $row->name }}</div>
										</div>
										@if($row->options->size == NULL)

										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{ $row->options->size }}</div>
										</div>
										@endif
										@if($row->options->color == NULL)

										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $row->options->color }}</div>
										</div>
										@endif

										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div><br>
											<form action="{{ route('update.cartitem') }}" method="post">
												@csrf
												<input type="number" name="qty" value="{{ $row->qty }}" style="width: 50px">
												<input type="hidden" name="productid" value=" {{ $row->rowId }} ">
												<button type="submit" class="bn btn-success btn-sm"><i class="fas fa-check"></i></button>						
											</form>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">{{ $row->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">{{ $row->price*$row->qty }}</div>
										</div>

										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text">
												<a href="{{ url( 'remove/cart/'.$row->rowId )}}" class="btn btn-sm btn-danger">X</a>
											</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total_content" style="padding: 50px;">
							@if(Session::has('coupon'))
							@else
							<h5 class="form-group col-lg-4">Apply Coupon</h5>
							<form action="{{ route('apply.coupon')}}" method="post">
								@csrf
								<div class="form-group col-lg-4">
									<input type="text" name="coupon" class="form-control" required="" placeholder="Enter your coupon"><br>
									<button type="submit" class="btn btn-danger col-lg-4">Submit</button>	
								</div>
								
							</form>
							@endif
						</div>
						<ul class="list-group col-lg-4" style="float: right;">
							@if(Session::has('coupon'))
								<li class="list-group-item">Subtotal : <span style="float: right;">${{ Session::get('coupon')['balance'] }}</span></li>
								<li class="list-group-item">Coupon <span class="badge" style="background: green; color: white;">({{ Session::get('coupon')['name'] }} )</span> : 
								<a href="{{ route('coupon.remove') }}" class="btn btn-danger btn-sm">X</a>

								<span style="float: right;">${{ Session::get('coupon')['discount'] }}</span>
							</li>
							@else
								<li class="list-group-item">Subtotal : ${{ Cart::Subtotal() }}</span></li>
							@endif
							
							<li class="list-group-item">Shipping Charge : <span style="float: right;">${{ $set->shipping_charge }}</span></li>
							<li class="list-group-item">Vat : <span style="float: right;">${{ $set->vat}}</span></li>
							@if(Session::has('coupon'))
							<li class="list-group-item">Total : <span style="float: right;">${{ Session::get('coupon')['balance'] + $set->shipping_charge + $set->vat }}</span></li>
							@else
							<li class="list-group-item">Total : <span style="float: right;">${{ Cart::Subtotal()+ $set->shipping_charge + $set->vat }}</span></li>
							@endif
						</ul>

					</div>
				</div>
			</div>
						<div class="form-group" style="float: right ; right: 100px; top: 50px;">
							<button type="button" class="button cart_button_clear">All Cancel</button>
							<a href="{{ route('payment.step') }}" class="button cart_button_checkout">Proceed</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection