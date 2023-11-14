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


    public function show()
    {
        return view('cart.show');
    }

    public function add(Product $product, Request $request)
    {

        // Validation de la requête
        $this->validate($request, [
            "quantity" => "numeric|min:1"
        ]);

        // Add/Update product to cart with quantity
        $this->cartRepository->add($product, $request->quantity);

        return back()->withMessage("Produit ajouté au panier");
    }

    public function remove(Product $product)
    {

        // Suppression du produit du panier par son identifiant
        $this->cartRepository->remove($product);

        // Redirection vers le panier
        return back()->withMessage("Produit retiré du panier");
    }

    public function empty () {

    	// Suppression des informations du panier en session
    	$this->cartRepository->empty();

    	// Redirection vers le panier
    	return back()->withMessage("Panier vidé");

    }
}
