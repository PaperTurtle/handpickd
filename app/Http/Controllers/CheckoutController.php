<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Exception;

/**
 * CheckoutController handles operations related to the shopping cart and checkout process.
 */
class CheckoutController extends Controller
{
    /**
     * Display the checkout page with items in the authenticated user's shopping cart.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cartItems = ShoppingCart::with('product')->where('user_id', auth()->id())->get();

        return view('checkout.index', compact('cartItems'));
    }

    /**
     * Add a product to the authenticated user's shopping cart. If the user is not authenticated, redirect to login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request)
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        $cartItem = ShoppingCart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            ShoppingCart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Remove an item from the shopping cart by its item ID.
     *
     * @param  int  $cartItemId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromCart($cartItemId)
    {
        ShoppingCart::where('id', $cartItemId)->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    /**
     * Display the shopping cart contents for the authenticated user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewCart()
    {
        $cartItems = ShoppingCart::where('user_id', auth()->id())->get();

        return view('cart.index', compact('cartItems'));
    }

    /**
     * Process the checkout by creating transactions for each item in the cart and updating product quantities.
     * On success, the user's cart is cleared and the user is redirected to a success route.
     * On failure, the transaction is rolled back and the user is redirected back with an error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckout(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = auth()->user();
            $cartItems = ShoppingCart::with('product')->where('user_id', $user->id)->get();

            foreach ($cartItems as $item) {
                Transaction::create([
                    'buyer_id' => $user->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'total_price' => $item->quantity * $item->product->price,
                    'status' => 'pending',
                ]);

                $item->product->decrement('quantity', $item->quantity);
            }

            ShoppingCart::where('user_id', $user->id)->delete();
            DB::commit();
            return redirect()->route('checkout.success')->with('success', 'Your purchase has been completed successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }

    /**
     * Remove an item from the shopping cart via an AJAX request. Responds with JSON.
     *
     * @param  int  $cartItemId
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($cartItemId)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => 'Item removed from cart'], 200);
        }

        return response()->json(['error' => 'Item not found'], 404);
    }
}
