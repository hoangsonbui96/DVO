<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCustomers;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TCustomersController extends Controller
{
    public function index(){
        //dd(DB::table('t_customer')->get());
        //dd(TCustomers::all());
        $customers = TCustomers::all();
        //$test = TCustomers::test();
        return view('tcustomer.index',['customers' => DB::table('t_customer')->paginate(2)]);
    }

    public function edit($id){
        $customers = TCustomers::findOrFail($id);
        return view('tcustomer.edit', compact('customers'));
    }

    public function update(Request $request, TCustomers $customers, $id)
    {
        $customers = TCustomers::findOrFail($id);
        request()->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'birth_day' => 'required',
            'password' => 'confirmed'
        ]);
        //$user->update($request->all());

        $customers->update([
            'full_name' => $request->input('full_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'birth_day' => $request->input('birth_day'),
            'password' => bcrypt($request->input('password')),
        ]);

        return Redirect::route("customer")
            ->with('success','Đã sửa thành công');        
    }

    public function getSearchAjax(Request $request)
    {
        $query = $request->get('query');
        $page = $request->get('page');
        //dd($query.'---'.$page);
        if ($query == '') {
            $data = DB::table('t_customer')->paginate(2);
        } else {
            $data = DB::table('t_customer')
                        ->where('user_name', 'LIKE', "%{$query}%")
                        ->orWhere('full_name', 'LIKE', "%{$query}%")
                        ->orWhere('phone', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->paginate(2);
        }
        return response()->json($data);
    }
}
