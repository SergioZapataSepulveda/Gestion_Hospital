<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UsuarioLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:usuario', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.usuario-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'correo'   => 'required|email',
        'password' => 'required'
      ]);

      // Attempt to log the user in
      if (Auth::guard('usuario')->attempt(['correo' => $request->correo, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('usuario.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('correo', 'remember'));
    }

    public function logout()
    {
        Auth::guard('usuario')->logout();
        return redirect('/');
    }
}
