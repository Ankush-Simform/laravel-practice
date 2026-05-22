<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserDetailController extends Controller
{
    // GET ALL USERS
    public function index()
    {
        $users = UserDetail::all();

        return response()->json([
            'status' => true,
            'data' => $users
        ]);
    }

    // STORE USER
    public function store(Request $request)
    {
        $user = UserDetail::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Created',
            'data' => $user
        ]);
    }

    // SINGLE USER
    public function show($id)
    {
        $user = UserDetail::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User Not Found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

    // UPDATE USER
    public function update(Request $request, $id)
    {
        $user = UserDetail::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User Not Found'
            ], 404);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Updated',
            'data' => $user
        ]);
    }

    // DELETE USER
    public function destroy($id)
    {
        $user = UserDetail::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User Not Found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User Deleted'
        ]);
    }
}