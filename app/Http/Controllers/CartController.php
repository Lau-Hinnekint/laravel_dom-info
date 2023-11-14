<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CartInterfaceRepository;

use App\Models\Product;

class CartController extends Controller
{
    protected $cartRepository;

    /**
     * Constructor used to inject a dependance of 'CartInterfaceRepository' type into the object being construct
     *
     * @param CartInterfaceRepository $cartRepository
     */
    public function __construct(CartInterfaceRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Show the cart
     *
     * @return void
     */
    public function show()
    {
        return view('cart.show');
    }

    /**
     * Add a product into the cart
     *
     * @param Product $product
     * @param Request $request
     * @return void
     */
    public function add(Product $product, Request $request)
    {

        // Validation of the request only if it is >=1
        $this->validate($request, [
            "quantity" => "numeric|min:1"
        ]);

        // Add/Update product to cart with quantity
        $this->cartRepository->add($product, $request->quantity);

        // Redirection to the cart
        return redirect()->route("cart.show")->withMessage("Produit ajouté au panier");
    }

    /**
     * Remove a product from the cart 
     *
     * @param Product $product
     * @return void
     */
    public function remove(Product $product)
    {

        // Remove a product form the cart with his ID 
        $this->cartRepository->remove($product);

        // Redirection to the cart
        return back()->withMessage("Produit retiré du panier");
    }

    /**
     * Empty the cart
     *
     * @return void
     */
    public function empty () {

    	// Delete the cart data in session
    	$this->cartRepository->empty();

    	// Redirection to the cart
    	return back()->withMessage("Panier vidé");

    }
}
