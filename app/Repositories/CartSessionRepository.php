<?php

namespace App\Repositories;

use App\Models\Product;

class CartSessionRepository implements CartInterfaceRepository  {

    /**
	 * Show the cart
	 *
	 * @return void
	 */
	public function show () {
		return view('cart.show');
	}

    /**
	 * Add a product to the cart 
	 *
	 * @param Product $product
	 * @param [type] $quantity
	 * @return void
	 */
	public function add (Product $product, $quantity) {		
		$cart = session()->get("cart");

		
		$product_details = [ // Details of the product to add
            'id' => $product->id,
			'name' => $product->product_name,
			'price' => $product->product_price,
			'quantity' => $quantity
		];
		
		$cart[$product->id] = $product_details; // Add or update the product in the cart 
		session()->put("cart", $cart); // Saving the cart
	}

	/**
	 * Remove a product from the cart
	 *
	 * @param Product $product
	 * @return void
	 */
	public function remove (Product $product) {
		$cart = session()->get("cart"); // Retrieve the cart in session
		unset($cart[$product->id]); // Delete the product from the cart using his ID 
		session()->put("cart", $cart); // Saving the cart
	}

	/**
	 * Delete the cart
	 *
	 * @return void
	 */
	public function empty () {
		session()->forget("cart"); // Delete the cart in session
	}

}
