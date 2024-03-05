<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Organiser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
                'role' => ['required', 'in:customer,organiser,admin'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $pictureName = time() . '.' . $request->file('picture')->extension();
            $request->file('picture')->storeAs('public/image', $pictureName);

            $user = User::create([
                'picture' => $pictureName,
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($request->role === 'customer') {
                $customerData['user_id'] = $user->id;
                Customer::create($customerData);
                event(new Registered($user));
                Auth::login($user);
                return redirect(RouteServiceProvider::CUSTOMER);
            } elseif ($request->role === 'organiser') {
                $organiserData['user_id'] = $user->id;
                Organiser::create($organiserData);
                event(new Registered($user));
                Auth::login($user);
                return redirect(RouteServiceProvider::ORGANISER);
            } elseif ($request->role === 'admin') {
                $adminData['user_id'] = $user->id;
                Admin::create($adminData);
                event(new Registered($user));
                Auth::login($user);
                return redirect(RouteServiceProvider::ADMIN);
            }

            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while processing your request. Please try again later.']);
        }
    }
}
