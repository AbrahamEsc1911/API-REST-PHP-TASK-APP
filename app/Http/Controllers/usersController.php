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

    public function updateUserData(Request $request, $id)
    {

        if(empty($id) || !is_numeric($id)) {
            $data = [
                'message' => 'Invalid or missing Id',
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $user = User::find($id);

        if (!$user) {
            $data = [
                'message' => 'User not found',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        if (!$request->hasAny(['name', 'email', 'password'])) {
            return response()->json([
                'message' => 'No data provided to update',
                'status' => 400
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|max:20' 
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error validating data',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        if($request->has('name')) {
            $user->name = $request->name;
        }

        if($request->has('email')) {
            $user->email = $request->email;
        }

        if($request->has('password')) {
            $user->password = $request->password;
        }

        $user->save();

        return response()->json([
            'message' => 'User data updated successfully',
            'user' => $user,
            'status' => 200
        ], 200);
    }

    public function deleteUser($id = null)
    {
        if(empty($id) || !is_numeric($id)) {
            $data = [
                'message' => 'Invalid or missing Id',
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        try {
            $user = User::find($id);

        if (!$user) {
            $data = [
                'message' => 'User to delete not found',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $user->delete();

        $data = [
            'message' => 'User deleted successfully',
            'status' => 200
        ];

        return response()->json($data, 200);

        } catch (\Exception $e) {
        $data = [
            'message' => 'An error occurred while trying to delete the user',
            'error' => $e->getMessage(),
            'status' => 500
        ];

        return response()->json($data, 500);
         } 
    }

}

