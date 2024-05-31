<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('admin-manages')) {
            abort(403, 'Unauthorized action.');
        }

        $admins = User::where('role_id', 1)->get();
        $authors = User::where('role_id', 2)->get();
        $users = User::where('role_id', 3)->get();
        $title = 'Total Users : '. count($admins) + count($authors) + count($users);

        return view('admin.users.index', compact('admins', 'authors', 'users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('admin-manages')) {
            abort(403, 'Unauthorized action.');
        }
        $title = 'Create User';
        return view('admin.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        // Assuming you have a roles relationship method in User model
        $user->Roles()->hasMacro($request->role_id);

        return redirect()->route('admin.users.index')->with('status', 'User Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            // Cek apakah pengguna memiliki postingan terkait
            if ($user->posts()->exists()) {
                return redirect()->route('admin.users.index')->with('error', 'Failed to delete. User has related posts.');
            }

            $user->delete();

            return redirect()->route('admin.users.index')->with('status', 'User Deleted Successfully!');
        } catch (QueryException $e) {
            return redirect()->route('admin.users.index')->with('error', 'Failed to delete user. Foreign key constraint error: ' . $e->getMessage());
        }
    }
}
