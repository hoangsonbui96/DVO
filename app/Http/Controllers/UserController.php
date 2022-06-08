<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Laravel\Sanctum\HasApiTokens;
use MongoDB\Client;

class UserController extends Controller
{
    use HasApiTokens;
    //
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed',
            'name' => 'required|string',
            'phone' => 'required'
        ]);

        $newuser = new User;
        $newuser->name = $request->name;
        $newuser->username = $request->username;
        $newuser->email = $request->email;
        $newuser->password =  bcrypt($request->password);
        $newuser->phone = $request->phone;
        $newuser->save();

        //User::create($request->all());
        return Redirect::route('user.index')
            ->with('success', 'Tạo tài khoản thành công');
    }

    public function edit(User $user, $id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {
        $user = User::findOrFail($id);
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'confirmed',
            'phone' => 'required'
        ]);
        //$user->update($request->all());

        $user->update([
            'password' => bcrypt($request->input('password')),
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ]);

        return Redirect::route("user.index")
            ->with('success','Đã sửa thành công');        
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return Redirect::route('user.index')
            ->with('success', 'Đã xóa thành công');
    }

    public function getSearchAjax(Request $request)
    {
        $query = $request->get('query');
        if ($query == '') {
            $data = User::all();
        } else {
            $data = User::where('username', 'LIKE', "%{$query}%")
                        ->orWhere('name', 'LIKE', "%{$query}%")
                        ->orWhere('phone', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->get();
        }
        return response()->json($data);
    }
}
