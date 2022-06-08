<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(){
        return view('login');
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'name' => 'required|string',
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
        
        $user = new User([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
        ]);
        
        $user->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);

            $credentials = request(['username', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Unauthorized'
                ]);
            }

            $user = User::where('username', $request->username)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }

            //create token when login success
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'message' => 'Login success'
            ]);
            
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('laravel_session'));
        $request->user()->tokens()->delete();
        //$request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function users(Request $request)
    {
        return $request->user();
    }
}