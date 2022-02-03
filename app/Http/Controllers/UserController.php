<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\{Auth, Hash};

class UserController extends Controller
{
    /**
     * Show form to create new user
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create', ['title' => "Create user"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $findUser = User::where('email', $data['email'])->first();


        if (!empty($findUser)) {
            return redirect()->back()->withErrors("E-mail already exists");
        }

        $user['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('index');
    }
}
