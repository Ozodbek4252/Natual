<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordUpdateRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('dashboard.profile.index', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        try {
            /**
             * @var User
             */
            $user = auth()->user();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            toastr('Updated successfully');

            return redirect()->route('profile');
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Error. Can\'t update',
            ]);
        }
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {
        try {
            /**
             * @var User
             */
            $user = auth()->user();

            // Check if the current password matches the user's existing password
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();

            toastr('Password updated successfully');

            return redirect()->route('profile');
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Error. Can\'t update',
                'message' => $e->getMessage()
            ]);
        }
    }
}
