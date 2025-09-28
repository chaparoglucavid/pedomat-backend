<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::IsUser()->get();
        return view('admin-dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'             => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'nullable|string|max:20',
            'birthdate'             => 'nullable|date',
            'password'              => 'required|string|min:6|confirmed',
            'user_current_balance'  => 'nullable|numeric|min:0',
            'type'                  => 'required|in:user,admin,moderator',
            'activity_status'       => 'required|in:active,inactive',
            'system_status'         => 'required|in:verified,unverified,blocked',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['user_current_balance'] = $validated['user_current_balance'] ?? 0.00;

        User::create($validated);

        return redirect()->route('users.index')
                        ->with('success', 'Yeni istifadəçi uğurla əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decrypt = decrypt($id);
        $user = User::IsUser()->find($decrypt);
        if(!$user)
        {
            flash()->error('İstifadəçi tapılmadı.');
            return redirect()->back();
        }
        $user->load('user_balance_history', 'orders', 'equipment_reviews');
        return view('admin-dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decrypted = decrypt($id);
        $user = User::find($decrypted);
        if(!$user)
        {
            flash()->error('İstifadəçi tapılmadı.');
            return redirect()->back();
        }
        return view('admin-dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $decrypt = decrypt($id);
        $user = User::find($decrypt);
        $validated = $request->validate([
        'full_name'             => 'required|string|max:255',
        'email'                 => 'required|email|unique:users,email,' . $user->id,
        'phone'                 => 'nullable|string|max:20',
        'birthdate'             => 'nullable|date',
        'password'              => 'nullable|string|min:6|confirmed',
        'user_current_balance'  => 'nullable|numeric|min:0',
        'type'                  => 'required|in:user,admin,moderator',
        'activity_status'       => 'required|in:active,inactive',
        'system_status'         => 'required|in:verified,unverified,blocked',
    ]);

    // Əgər şifrə daxil edilibsə, hash et
    if (!empty($validated['password'])) {
        $validated['password'] = bcrypt($validated['password']);
    } else {
        unset($validated['password']); // boş şifrəni update etmə
    }

    $validated['user_current_balance'] = $validated['user_current_balance'] ?? $user->user_current_balance;

    $user->update($validated);

    return redirect()->route('users.index')
                     ->with('success', 'İstifadəçi uğurla yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
