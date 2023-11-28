<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Mail\SendOrderConfirmation;
use Illuminate\Support\Facades\Mail;
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

    public function process(Request $request): View
    {
        $user = $request->user();
        $cartItems = ShoppingCart::with('product')->where('user_id', auth()->id())->get();
        return view('checkout.process',["user"=>$user, "cartItems"=>$cartItems]);
    }

    /**
     * Add a product to the authenticated user's shopping cart.
     * If the user is not authenticated, they are redirected to the login page.
     * If the product already exists in the cart, its quantity is updated; otherwise, a new cart item is created.
     *
     * @param AddToCartRequest $request The request object containing product details.
     * @return JsonResponse Redirects back with a success message on adding the product.
     */
    public function addToCart(AddToCartRequest $request): JsonResponse
    {
        $this->authorize('addToCart', ShoppingCart::class);

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

        return response()->json(['success' => 'Product added to cart!']);
    }

    /**
     * Remove an item from the shopping cart by its item ID.
     * Only affects the item specified by the provided cart item ID.
     *
     * @param int $cartItemId The unique identifier of the cart item to be removed.
     * @return JsonResponse Redirects back with a success message on removing the product.
     */
    public function removeFromCart(int $cartItemId): JsonResponse
    {
        $cartItem = ShoppingCart::where('user_id', auth()->id())->findOrFail($cartItemId);

        $this->authorize('removeFromCart', $cartItem);

        $cartItem->delete();

        return response()->json(["success" => "Product removed from cart!"]);
    }

    /**
     * Update the quantity of an item in the shopping cart.
     * If the cart item exists and belongs to the authenticated user, its quantity is updated.
     * Responds with JSON indicating the success or failure of the operation.
     *
     * @param int $itemId The ID of the cart item to update.
     * @param UpdateCartRequest $request The request object containing the new quantity.
     * @return JsonResponse Returns JSON response with the result of the update operation.
     */
    public function updateCart(int $itemId, UpdateCartRequest $request): JsonResponse
    {
        $cartItem = ShoppingCart::where('user_id', auth()->id())->findOrFail($itemId);

        $this->authorize('update', $cartItem);

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['success' => 'Cart updated successfully']);
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
            $transactionDetails = [];

            foreach ($cartItems as $item) {
                $transaction = Transaction::create([
                    'buyer_id' => $user->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'total_price' => $item->quantity * $item->product->price,
                    'status' => 'pending',
                ]);

                $transactionDetails[] = $transaction;
                $item->product->decrement('quantity', $item->quantity);
            }

            ShoppingCart::where('user_id', $user->id)->delete();
            DB::commit();
            Mail::to($user->email)->send(new SendOrderConfirmation($user, $transactionDetails));
            return redirect()->route('checkout.success')->with('success', 'Your purchase has been completed successfully!')
                ->with('transactionDetails', $transactionDetails);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException) {
            return redirect()->back()->with('error', 'Product not found.');
        } catch (Exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }
}
