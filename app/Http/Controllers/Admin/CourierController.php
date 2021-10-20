<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class CourierController extends Controller
{
    public function couriers()
    {
        Session::put('page', 'couriers');
        $couriers = Courier::all();
        return view('admin.couriers.couriers')->with(compact('couriers'));
    }
    public function addEditCourier( Request $request, $id=null)
    {
        if($id=="")
        {
            $title = "Add Courier";
            $courier = new  Courier();
            $courierdata = array();
            $message = "Courier has been added successfully!";
        }
        else
        {
            $title = "Edit Courier";
            $courierdata = Courier::find($id);
            $courier = Courier::find($id);
            $message = "Courier has been updated successfully!";
        }
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            // Validation
            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'address' => 'required|string',
            ];
            $customMessages = [
                'name.required' => 'Name is required',
                'name.regex' => 'Valid courier name is required',
                'address.required' => ' Address is required',
            ];
            $this->validate($request,$rules,$customMessages);
            // Save Courier Details
            $courier->name = $data['name'];
            $courier->address = $data['address'];
            $courier->number='COU-'.strtoupper(Str::random(5));
            $courier->save();
            session::flash('success_message',$message);
            return redirect('admin/couriers');

        }
        return view ('admin.couriers.add_edit_courier')->with(compact('title','courierdata'));
    }
    public function deleteCourier($id)
    {
        //Delete Product
        Courier::where('id',$id)->delete();
        $message = 'Courier has been deleted!';
        session()->flash('success_message',$message);
        return redirect()->back();
    }
}
