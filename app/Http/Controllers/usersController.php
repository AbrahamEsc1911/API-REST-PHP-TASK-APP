<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Database\QueryException;

class usersController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error validating data',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        try {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'user' => $user,
            'status' => 201
        ], 201);

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
            return response()->json([
                'message' => 'The email is already registered',
                'status' => 409
            ], 409); 
            }

            return response()->json([
                'message' => 'Database error',
                'status' => 500
            ], 500);
        }
    
    }

    public function getAllUsers()
    {
        $users = User::all();
    
        if ($users->isEmpty()) {
            $data = [
                'message' => 'There are no users registered',
                'status' => 404
            ];
        
            return response()->json($data, 404);
        }
    
        $data = [
            'users' => $users,
            'status' => 200
        ];
    
        return response()->json($data, 200);
    }

    public function getUserById($id)
    {
        $user = User::find($id);

        if (!$user) {
            $data = [
                'message' => 'User Not found',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'user' => $user,
            'status' => 200
        ];
    
        return response()->json($data, 200);
    }

}

