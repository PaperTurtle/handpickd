<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
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
     * Display the user's profile.
     * This method returns the view for the user's profile with the user data.
     * 
     * @param int $userID The ID of the user whose profile is being displayed.
     * @return View Returns the view for the user's profile with the user data.
     */
    public function show(int $userID): View
    {
        $user = User::findOrFail($userID);
        return view('profile.show', ['user' => $user]);
    }

    /**
     * Display the user's profile form for editing.
     * This method returns the view for the user to edit their profile information.
     *
     * @param Request $request The current request instance.
     * @return View Returns the view for editing the user's profile with the user data.
     */
    public function edit(int $userID): View
    {
        $user = User::findOrFail($userID);
        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update the user's profile information.
     * This method updates the user's profile with the validated data from the request.
     * If the email is changed, it resets the email verification status.
     * It returns a redirect response to the profile edit page with a status message.
     *
     * @param ProfileUpdateRequest $request The request instance containing validated profile data.
     * @param int $userID The ID of the user whose profile is being updated.
     * @return RedirectResponse Returns a redirect response to the profile edit page with a status message.
     */
    public function update(ProfileUpdateRequest $request, int $userID): RedirectResponse
    {
        $user = User::findOrFail($userID);
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit', $userID)->with('status', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     * This method deletes the authenticated user's account after validating the provided password.
     * It logs out the user, invalidates the session, and redirects to the home page.
     *
     * @param Request $request The current request instance.
     * @param int $userID The ID of the user whose account is being deleted.
     * @return RedirectResponse Returns a redirect response to the home page after account deletion. 
     */
    public function destroy(Request $request, int $userID): RedirectResponse
    {
        $user = User::findOrFail($userID);

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password:web'],
        ]);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Account deleted successfully.');
    }
}
