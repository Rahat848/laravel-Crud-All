<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    function index(){
        return view('customerform');
    }

    function store(Request $request){


        // echo "<pre>";
        // print_r($request->all());


        //inset operation
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = $request['password'];
        $customer->save();

        return redirect('/customer');
    }

    function view(){
        $customers = Customer::all($column = ['*']); //all($column = ['*']); emon na likla error ascilo.
        $data = compact('customers');

       return view('customer-view')->with($data);
    }
    function trash(){
        $customers = Customer::onlyTrashed()->get($column = ['*']);
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }
    function restore($id){
        $customer = Customer::withTrashed()->find($id,$column = ['*']);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect()->back();
    }

    function delete($id){
     $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/customer');
        
    }
    function forceDelete($id){
     $customer = Customer::withTrashed()->find($id,$column = ['*']);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect('/customer');
        
    }

    function edit($id){
        $customer = Customer::find($id);

        if(is_null($customer)){
            //not found
            return redirect('/customer');
        }else{
            //fond
            $url = url('/customer/update').'/'.$id;
            $data = compact('customer','url');
            return view('customerupdateform')->with($data);
        }
    }


    function update($id,Request $request){
        
        {
            $customer = Customer::find($id);
            $customer->name = $request['name'];
            $customer->email = $request['email'];
            $customer->password = $request['password'];
            $customer->save();
            return redirect('/customer');
        }
    }
}
