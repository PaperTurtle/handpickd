<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * ProfileController is responsible for managing user profile information.
 * This includes displaying the edit form, updating profile data, and deleting the user's account.
 */
class ProfileController extends Controller
{
    /**
     * Display the user's profile form for editing.
     * This method returns the view for the user to edit their profile information.
     *
     * @param Request $request The current request instance.
     * @return View Returns the view for editing the user's profile with the user data.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     * This method updates the user's profile with the validated data from the request.
     * If the email is changed, it resets the email verification status.
     * It returns a redirect response to the profile edit page with a status message.
     *
     * @param ProfileUpdateRequest $request The request instance containing validated profile data.
     * @return RedirectResponse Returns a redirect response to the profile edit page with a status message.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     * This method deletes the authenticated user's account after validating the provided password.
     * It logs out the user, invalidates the session, and redirects to the home page.
     *
     * @param Request $request The current request instance.
     * @return RedirectResponse Returns a redirect response to the home page after account deletion. 
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Account deleted successfully.');
    }
}
