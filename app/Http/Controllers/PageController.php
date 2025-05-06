<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'Rizqi Cahyani' && $password === 'cahyani123') {
            $request->session()->put('username', $username);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function dashboard(Request $request)
    {
        $username = $request->session()->get('username');
        if (!$username) {
            return redirect()->route('login.form');
        }

        $recipes = session()->get('recipes', []);
        return view('dashboard', compact('username', 'recipes'));
    }

    public function profile(Request $request)
    {
        $username = $request->session()->get('username');
        if (!$username) {
            return redirect()->route('login.form');
        }

        return view('profile', compact('username'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect()->route('login.form');
    }

    // ==== PENGELOLAAN RESEP ====

    public function showRecipes(Request $request)
    {
        $username = $request->session()->get('username');
        if (!$username) {
            return redirect()->route('login.form');
        }

        $recipes = session()->get('recipes', []);
        return view('recipes.recipes', compact('recipes', 'username'));
    }

    public function createRecipe()
    {
        $username = session()->get('username');
        if (!$username) {
            return redirect()->route('login.form');
        }
        return view('recipes.create');
    }

    public function storeRecipe(Request $request)
{
    $request->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'steps' => 'required',
        'category' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $recipes = session()->get('recipes', []);
    $validRecipes = array_filter($recipes, fn($r) => is_array($r) && isset($r['id']));
    $id = !empty($validRecipes)
        ? max(array_map(fn($r) => $r['id'], $validRecipes)) + 1
        : 1;

    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');
    }

    $recipes[] = [
        'id' => $id,
        'name' => $request->input('name'),
        'ingredients' => $request->input('ingredients'),
        'steps' => $request->input('steps'),
        'category' => $request->input('category'),
        'image' => $imagePath,
    ];

    session()->put('recipes', $recipes);
    return redirect()->route('recipes')->with('success', 'Resep berhasil ditambahkan!');
}

    public function deleteRecipe($id)
    {
        $recipes = session()->get('recipes', []);
        $recipes = array_filter($recipes, fn($r) => $r['id'] != $id);
        session()->put('recipes', array_values($recipes));
        return redirect()->route('recipes')->with('success', 'Resep berhasil dihapus!');
    }
}
