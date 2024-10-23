<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
        return view('admin.adminHome');
    }
    public function managerHome()
    {
        return view('managerHome');
    }
    public function logout(Request $request)
    {
        auth()->logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }
}