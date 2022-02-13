<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Auth form view
     *
     * @return View
     */
    public function index(): View
    {
        return view('auth.index', ['title' => 'Auth user']);
    }

    /**
     * Auth user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function auth(Request $request): RedirectResponse
    {
        $user = Auth::attempt($request->only('email', 'password'));

        if (!$user) {
            return redirect()->back()
                ->withErrors('User or passwords are incorrect');
        }

        return redirect()->route('index');
    }

    /**
     * Finish user session
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
