<div class="action-bar-input">
	<input type="text" placeholder="输入查询的订单编号，然后点击右边的放大镜">
	<button class="btn"><i class="fa fa-search"></i></button>
</div>
<ul class="card-list card-list-striped row cards-order">
	@foreach ( $orders as $order )
	<li class="col-xs-12">
		<div class="card">
			<div class="card-content">
				<div class="order-info">
					<img src="{{ $order->buyers->avatarUri }}" alt="">
					<p><b>订单编号</b> {{ $order->id }}</p>
					<p><b>购买用户</b> {{ $order->buyers->name }}</p>
				</div>
				<div class="order-content">
					<ul>
						@foreach ( $order->orderItems as $orderItem )
						<li><img src="{{ $orderItem->items->coverUri }}" alt=""></li>
						@endforeach
					</ul>
				</div>
				<div class="order-price">
					<p><span><i class="fa fa-jpy"></i></span>{{ $order->totalPrice }}</p>
				</div>
			</div>
		</div>
	</li>
	@endforeach
</ul>
