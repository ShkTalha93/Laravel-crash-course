<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        $url = url('/customer');
        $title = "Customer Registration";
        $data = compact('url', 'title');
        return view('customer')->with($data);
    }
    public function store(Request $request)
    {


        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]
        );
        // echo '<pre>';
        // print_r($request->all());

        // return view('home');
        // $gender='M';


        // Insert Query in Laravel
        $customer = new Customer;
        $customer->user_name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = md5($request['password']);
        $customer->address = $request['password'];
        $customer->save();

        return redirect('/customer');
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search){
            $customers = Customer::where('user_name','Like',"%$search%")->orwhere('email', 'LIKE', "%$search%")->get();
        }
        else{
            $customers = Customer::paginate(15);
        }

        
        $data = compact('customers','search');

        return view('customer-view')->with($data);
    }

    public function trash()
    {
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');

        return view('customer-trash')->with($data);
    }
    public function delete($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
        }
        return redirect('customer');
    }
    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if ($customer) {
            $customer->forceDelete();
        }
        return redirect('customer/trash');
    }
    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if ($customer) {
            $customer->restore();
        }
        return redirect('customer/trash');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $url = url('/customer/update') . '/' . $id;
            $title = "Update Customer";
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        } else {
            return redirect('customer');
        }
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);

        $customer->user_name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = md5($request['password']);
        $customer->address = $request['password'];
        $customer->save();

        return redirect('/customer');
    }
}