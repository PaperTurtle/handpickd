<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Exception;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = ShoppingCart::with('product')->where('user_id', auth()->id())->get();

        return view('checkout.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        ShoppingCart::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function removeFromCart($cartItemId)
    {
        ShoppingCart::where('id', $cartItemId)->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function viewCart()
    {
        $cartItems = ShoppingCart::where('user_id', auth()->id())->get();

        return view('cart.index', compact('cartItems'));
    }

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
