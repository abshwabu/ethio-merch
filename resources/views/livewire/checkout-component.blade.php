<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<form action="" wire:submit.prevent="placeOrder" >
					<div class="row">
						<div class="col-md-12">
							<div class="wrap-address-billing">
								<h3 class="box-title">Billing Address</h3>
								<div class="billing-address">
									<p class="row-in-form">
										<label for="fname">first name<span>*</span></label>
										<input  type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
										@error('firstname') <span class="text-danger">{{$message}} </span> @enderror
									</p>
									<p class="row-in-form">
										<label for="lname">last name<span>*</span></label>
										<input  type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
										@error('lastname') <span class="text-danger">{{$message}} </span> @enderror
									</p>
									<p class="row-in-form">
										<label for="email">Email Addreess:</label>
										<input  type="email" name="email" value="" placeholder="Type your email" wire:model="email">
										@error('email') <span class="text-danger">{{$message}} </span> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Phone number<span>*</span></label>
										<input  type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
										@error('mobile') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="add">Line1:</label>
										<input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
										@error('line1') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="add">Line2:</label>
										<input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
									</p>
									<p class="row-in-form">
										<label for="country">Country<span>*</span></label>
										<input  type="text" name="country" value="" placeholder="United States" wire:model="country">
										@error('country') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="zip-code">Kebele / woreda:</label>
										<input  type="text" name="zip-code" value="" placeholder="Your Kebele / woreda" wire:model="woreda">
										@error('woreda') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="city">Zone / City<span>*</span></label>
										<input  type="text" name="city" value="" placeholder="City name" wire:model="city">
										@error('city') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="city">sub_city / City<span>*</span></label>
										<input  type="text" name="city" value="" placeholder="sub_city / City" wire:model="sub_city">
										@error('Sub_city') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form fill-wife">
										
										<label class="checkbox-field">
											<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
											<span>Ship to a different address?</span>
										</label>
									</p>
								</div>
							</div>
						</div>
						@if($ship_to_different)
						<div class="col-md-12">
							<div class="wrap-address-billing">
								<h3 class="box-title">Shipping Address</h3>
								<div class="billing-address">
									<p class="row-in-form">
										<label for="fname">first name<span>*</span></label>
										<input  type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
										@error('s_firstname') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="lname">last name<span>*</span></label>
										<input  type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
										@error('s_lastname') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="email">Email Addreess:</label>
										<input  type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
										@error('s_email') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="phone">Phone number<span>*</span></label>
										<input  type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
										@error('s_mobile') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="add">Line1:</label>
										<input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line1">
										@error('s_line1') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="add">Line2:</label>
										<input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line2">
									</p>
									<p class="row-in-form">
										<label for="country">Country<span>*</span></label>
										<input  type="text" name="country" value="" placeholder="United States" wire:model="s_country">
										@error('s_country') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="zip-code">Kebele / woreda:</label>
										<input  type="text" name="zip-code" value="" placeholder="Your Kebele / woreda" wire:model="s_woreda">
										@error('s_woreda') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="city">Zone / City<span>*</span></label>
										<input  type="text" name="city" value="" placeholder="City name" wire:model="s_city">
										@error('s_city') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									<p class="row-in-form">
										<label for="city">sub_city / City<span>*</span></label>
										<input  type="text" name="city" value="" placeholder="sub_city / City" wire:model="s_sub_city">
										@error('s_sub_city') <span class="text-danger">{{$message}} </span> @enderror

									</p>
									
								</div>
							</div>
						</div>
						@endif
					</div>
					<div class="summary summary-checkout">
						<div class="summary-item payment-method">
							<h4 class="title-box">Payment Method</h4>
							<p class="summary-info"><span class="title">Check / Money order</span></p>
							<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
							<div class="choose-payment-methods">
								<label class="payment-method">
									<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
									<span>Cash on Delivery</span>
									<span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
									<span>Card</span>
									@livewire(chapa-component)
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-paypal" value="telebirr" type="radio" wire:model="paymentmode">
									<span>Telebirr</span>
									<span class="payment-desc">You can pay with your credit</span>
									<span class="payment-desc">card if you don't have a paypal account</span>
								</label>
								@error('paymentmode') <span class="text-danger">{{$message}} </span> @enderror

							</div>
							@if(Session::has('checkout'))
								<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>
							@endif
							<button type="submit" class="btn btn-medium">Place order now</button>
						</div>
						<div class="summary-item shipping-method">
							<h4 class="title-box f-title">Shipping method</h4>
							<p class="summary-info"><span class="title">Flat Rate</span></p>
							<p class="summary-info"><span class="title">Fixed 0.00</span></p>
							<!-- <h4 class="title-box">Discount Codes</h4>
							<p class="row-in-form">
								<label for="coupon-code">Enter Your Coupon code:</label>
								<input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
							</p>
							<a href="#" class="btn btn-small">Apply</a> -->

						</div>
					</div>
				</form>
				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_04.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_15.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_1.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_21.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_3.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_4.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('assets/images/products/digital_5.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
				</div>

				
			</div><!--end main content area-->
		</div><!--end container-->

	</main>