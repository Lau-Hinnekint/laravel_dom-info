<?php

namespace App\Repositories;

use App\Models\Product;

interface CartInterfaceRepository {

	// Show the cart
	public function show ();

	// Add a product to the cart
	public function add(Product $product, $quantity);

	// Remove a product from the cart
	public function remove(Product $product);

	// Empty the cart
	public function empty();

}

?>