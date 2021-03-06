@extends("store-app::master")

@section("store")

			<!-- =============================================
			=            Shop page container         =
			=============================================-->

{{--			{{ dd($products) }}--}}

			{{-- THIS IS THE PAGE RESULT COUNTER SECTION   --}}
{{--			@include('store-app::store.sidebar')--}}
			@if($products ?? '')
				<p class="result-show-message">Showing {{ $products->from() }} - {{ $products->to() }} of {{ $products->total() }} results</p>
			@endif

			{{-- THIS IS THE PRODUCT LISTING SECTION OF THE STORE --}}
			@if($products ?? '')
				@include('store-app::store.contents.listing', ['products' => $products->data()])
			@endif

			{{-- THIS IS THE PAGINATION SECTION OF THE STORE LOAD PRODUCTS --}}
			@if($products ?? '')

				<div class="pagination-container">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">

								<div class="pagination-content text-center">
									@include('store-app::products.components.paginator', ["paginator"=>$products])
								</div>

							</div>
						</div>
					</div>
				</div>

			@endif

@endsection