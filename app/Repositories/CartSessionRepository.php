<?php

namespace App\Repositories;

use App\Models\Product;

class CartSessionRepository implements CartInterfaceRepository  {

    // Show the cart
	public function show () {
		return view('cart.show');
	}

    // Add a product to the cart
	public function add (Product $product, $quantity) {		
		$cart = session()->get("cart");

		// Les informations du produit à ajouter
		$product_details = [
            'id' => $product->id,
			'name' => $product->product_name,
			'price' => $product->product_price,
			'quantity' => $quantity
		];
		
		$cart[$product->id] = $product_details; // On ajoute ou on met à jour le produit au panier
		session()->put("cart", $cart); // On enregistre le panier
	}

	// Remove a product from the cart
	public function remove (Product $product) {
		$cart = session()->get("cart"); // On récupère le panier en session
		unset($cart[$product->id]); // On supprime le produit du tableau $cart
		session()->put("cart", $cart); // On enregistre le panier
	}

	// Empty the cart
	public function empty () {
		session()->forget("cart"); // On supprime le panier en session
	}

}
