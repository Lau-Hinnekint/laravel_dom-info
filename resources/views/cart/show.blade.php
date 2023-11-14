@extends ('page')

@section ('body')

@php $title = "Dom'Info - Panier "; @endphp

<div class="container mb-5 mt-5">

	@if (session()->has('message'))
	<div class="alert alert-info">{{ session('message') }}</div>
	@endif

	@if (session()->has("cart"))
	<h1 class="text-white">Mon panier</h1>
	<div class="table-responsive shadow mb-3">
		<table class="table table-bordered table-hover bg-white mb-0">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>Produit</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Total</th>
					<th>Opérations</th>
				</tr>
			</thead>
			<tbody>
				<!-- Initialize total variable at 0 -->
				@php $total = 0 @endphp

				<!-- We browse the products in the cart in session: session('cart') -->
				@foreach (session("cart") as $key => $item)

				<!-- We increment the total general by the total of each product of the cart  -->
				@php $total += $item['price'] * $item['quantity'] @endphp

				<tr>
					<!-- Display the number of each iteration of the foreach in a column -->
					<td>{{ $loop->iteration }}</td>
					<td>
						<strong>
							<a href="{{ route('productDetail', ['key' => $key, 'id' => $item['id']]) }}" title="Afficher le produit">
								{{ $item['name'] }}
							</a>
						</strong>
					</td>
					<td>{{ $item['price'] }} €</td>
					<td>
						<!-- Update form of the quantity -->
						<form method="POST" action="{{ route('cart.add', $key) }}" class="form-inline d-inline-block">
							{{ csrf_field() }}
							<input type="number" name="quantity" placeholder="Quantité ?" value="{{ $item['quantity'] }}" class="form-control mr-2" style="width: 80px">
							<input type="submit" class="btn btn-primary" value="Actualiser" />
						</form>
					</td>
					<td>
						<!-- Total price of the product = quantity * price -->
						{{ $item['price'] * $item['quantity'] }} €
					</td>
					<td>
						<!-- CTA to remove a product from the cart -->
						<a href="{{ route('cart.remove', $key) }}" class="btn btn-outline-danger" title="Retirer le produit du panier">Retirer</a>
					</td>
				</tr>
				@endforeach
				<tr colspan="2">
					<td colspan="4">Total général</td>
					<td colspan="2">
						<!-- Display the total price -->
						<strong>{{ $total }} €</strong>
					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- CTA to empty the cart -->
	<a class="btn btn-danger mb-3	" href="{{ route('cart.empty') }}" title="Retirer tous les produits du panier">Vider le panier</a>

	@else
	<div class="alert alert-info">Aucun produit au panier</div>
	@endif

</div>
@endsection