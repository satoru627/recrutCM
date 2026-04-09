<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller {
    public function showRegister() { return view('auth.register'); }

    public function register(Request $request) {
        $request->validate([
            'nom'       => 'required|string|max:100',
            'prenom'    => 'required|string|max:100',
            'email'     => 'required|email|unique:users',
            'telephone' => 'required|string|max:20',
            'ville'     => 'required|string',
            'cv'        => 'nullable|file|mimes:pdf|max:2048',
            'password'  => ['required','confirmed',Password::min(6)],
        ]);
        $cvPath = null;
        if ($request->hasFile('cv')) $cvPath = $request->file('cv')->store('cvs','public');
        $user = User::create([
            'nom' => $request->nom, 'prenom' => $request->prenom,
            'email' => $request->email, 'telephone' => $request->telephone,
            'ville' => $request->ville, 'cv' => $cvPath,
            'password' => Hash::make($request->password), 'role' => 'client',
        ]);
        Auth::login($user);
        return redirect()->route('client.emplois.index')->with('success', 'Bienvenue '.$user->prenom.' !');
    }

    public function showLogin() { return view('auth.login'); }

    public function login(Request $request) {
        $request->validate(['email' => 'required|email', 'password' => 'required']);
        if (Auth::attempt($request->only('email','password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return Auth::user()->isAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('client.emplois.index');
        }
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
