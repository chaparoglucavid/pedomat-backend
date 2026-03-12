<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Http\Resources\UserResource;
use App\Models\Package;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPackageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $subs = UserPackage::with('package.features')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return response()->json(['success' => true, 'data' => $subs], 200);
    }

    public function active()
    {
        $user = Auth::user();
        $sub = UserPackage::with('package')->where('user_id', $user->id)->active()->first();
        return response()->json(['success' => true, 'data' => $sub], 200);
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        $pkg = Package::find($validated['package_id']);
        if (!$pkg || $pkg->status !== 'active') {
            return response()->json(['message' => 'Paket mövcud deyil və ya aktiv deyil'], 422);
        }

        // Cancel existing active subscription
        UserPackage::where('user_id', $user->id)->active()->update(['status' => 'cancelled']);

        $start = Carbon::today();
        $end = Carbon::today()->addDays($pkg->validity_days);
        $sub = UserPackage::create([
            'user_id' => $user->id,
            'package_id' => $pkg->id,
            'start_date' => $start->format('Y-m-d'),
            'end_date' => $end->format('Y-m-d'),
            'status' => 'active',
        ]);

        return response()->json(['success' => true, 'data' => $sub], 201);
    }

    public function cancel(Request $request)
    {
        $user = Auth::user();
        $sub = UserPackage::where('user_id', $user->id)->active()->first();
        if (!$sub) {
            return response()->json(['message' => 'Aktiv abunəlik tapılmadı'], 404);
        }
        $sub->status = 'cancelled';
        $sub->save();
        return response()->json(['success' => true], 200);
    }

    // Admin endpoints
    public function listByUser($userId)
    {
        $subs = UserPackage::with('package.features')->where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return response()->json(['success' => true, 'data' => $subs], 200);
    }

    public function activeByUser($userId)
    {
        $sub = UserPackage::with('package.features')->where('user_id', $userId)->active()->first();
        return response()->json(['success' => true, 'data' => $sub], 200);
    }

    public function subscribeByUser(Request $request, $userId)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);
        $pkg = Package::find($validated['package_id']);
        if (!$pkg || $pkg->status !== 'active') {
            return response()->json(['message' => 'Paket mövcud deyil və ya aktiv deyil'], 422);
        }
        UserPackage::where('user_id', $userId)->active()->update(['status' => 'cancelled']);
        $start = \Carbon\Carbon::today();
        $end = \Carbon\Carbon::today()->addDays($pkg->validity_days);
        $sub = UserPackage::create([
            'user_id' => $userId,
            'package_id' => $pkg->id,
            'start_date' => $start->format('Y-m-d'),
            'end_date' => $end->format('Y-m-d'),
            'status' => 'active',
        ]);
        return response()->json(['success' => true, 'data' => $sub], 201);
    }

    public function cancelByUser($userId)
    {
        $sub = UserPackage::where('user_id', $userId)->active()->first();
        if (!$sub) {
            return response()->json(['message' => 'Aktiv abunəlik tapılmadı'], 404);
        }
        $sub->status = 'cancelled';
        $sub->save();
        return response()->json(['success' => true], 200);
    }
}
