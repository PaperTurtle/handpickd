<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Exception;

/**
 * CheckoutController handles operations related to managing the shopping cart and processing the checkout in an e-commerce context.
 * This includes displaying the checkout page, adding/removing items from the cart, updating cart items, and processing the final checkout transaction.
 */
class CheckoutController extends Controller
{
    /**
     * Display the checkout page with items in the authenticated user's shopping cart.
     * Retrieves all cart items associated with the current authenticated user and passes them to the checkout view.
     *
     * @return View Returns a view of the checkout page with cart items.
     */
    public function index(): View
    {
        $cartItems = ShoppingCart::with('product')->where('user_id', auth()->id())->get();

        return view('checkout.index', compact('cartItems'));
    }

    /**
     * Add a product to the authenticated user's shopping cart.
     * If the user is not authenticated, they are redirected to the login page.
     * If the product already exists in the cart, its quantity is updated; otherwise, a new cart item is created.
     *
     * @param Request $request The request object containing product details.
     * @return RedirectResponse Redirects back with a success message on adding the product.
     */
    public function addToCart(Request $request): RedirectResponse
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
     * Only affects the item specified by the provided cart item ID.
     *
     * @param int $cartItemId The unique identifier of the cart item to be removed.
     * @return RedirectResponse Redirects back with a success message on removing the product.
     */
    public function removeFromCart(int $cartItemId): RedirectResponse
    {
        ShoppingCart::where('id', $cartItemId)->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    /**
     * Update the quantity of an item in the shopping cart.
     * If the cart item exists and belongs to the authenticated user, its quantity is updated.
     * Responds with JSON indicating the success or failure of the operation.
     *
     * @param int $itemId The ID of the cart item to update.
     * @param Request $request The request object containing the new quantity.
     * @return JsonResponse Returns JSON response with the result of the update operation.
     */
    public function updateCart(int $itemId, Request $request): JsonResponse
    {
        $cartItem = ShoppingCart::find($itemId);
        if ($cartItem && $cartItem->user_id == auth()->id()) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            return response()->json(['success' => 'Cart updated successfully']);
        }

        return response()->json(['error' => 'Cart item not found'], 404);
    }

    /**
     * Display the shopping cart contents for the authenticated user.
     * Retrieves and displays all cart items associated with the current authenticated user.
     *
     * @return View Returns a view of the shopping cart with the user's cart items.
     */
    public function viewCart(): View
    {
        $cartItems = ShoppingCart::where('user_id', auth()->id())->get();

        return view('cart.index', compact('cartItems'));
    }

    /**
     * Process the checkout by creating transactions for each item in the cart and updating product quantities.
     * On success, the user's cart is cleared and redirected to a success route.
     * On failure, the transaction is rolled back and the user is redirected back with an error message.
     *
     * @return RedirectResponse Redirects to a success route on successful checkout, or back with an error on failure.
     */
    public function processCheckout(): RedirectResponse
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
        } catch (Exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }

    /**
     * Remove an item from the shopping cart via an AJAX request.
     * Responds with JSON indicating success or failure based on whether the cart item was found and deleted.
     *
     * @param int $cartItemId The unique identifier of the cart item to be removed via AJAX.
     * @return JsonResponse Returns a JSON response indicating the result of the removal operation.
     */
    public function remove(int $cartItemId): JsonResponse
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => 'Item removed from cart']);
        }

        return response()->json(['error' => 'Item not found'], 404);
    }
}
