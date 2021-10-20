<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class ShipmentsController extends Controller
{
    public function shipments()
    {
        Session::put('page', 'shipments');
        $shipments = Shipment::with(['courier'=>function($query){
            $query->select('id','name');
        },'products'=>function($query){
            $query->select('name');
        }])->get();
        //$shipments = Shipment::where('status',"Delivered")->get();
        //dd($shipments); die;
        return view('admin.shipments.shipments')->with(compact('shipments'));
    }

    public function addEditShipment( Request $request, $id=null)
    {
        if($id=="")
        {
            $title = "Add Shipment";
            $shipment = new  Shipment();
            $shipmentdata = array();
            $message = "Shipment has been added successfully!";
            //Add Product
        }
        else
        {
            $title = "Edit Shipment";
            $shipmentdata = Shipment::find($id);
            $shipmentdata = json_decode(json_encode($shipmentdata),true);
            $shipment = Shipment::find($id);
            $message = "Shipment has been updated successfully!";
            //Edit Product
        }
        if ($request->isMethod('post'))
        {
            $data = $request->all();

            $rules = [
                'description' => 'required',
                'address' => 'required',
                'courier_id'=>'required',
            ];
            $customMessages = [
                'description.required' => 'Description is required',
                'address.required' => 'Address is required',
                'courier_id.required' => 'Courier name is required',
            ];
            $this->validate($request,$rules,$customMessages);

            $shipment->courier_id = $data['courier_id'];
            $shipment->number='SHP-'.strtoupper(Str::random(10));
            $shipment->description = $data['description'];
            $shipment->address = $data['address'];
            $shipment->status = $data['status'];
            $shipment->save();
            $product = Product::find($data['product_id']);
            $shipment->products()->attach($product);
            session::flash('success_message',$message);
            return redirect('admin/shipments');

        }

        $couriers = Courier::get();
        $couriers = json_decode(json_encode($couriers),true);
        $products = Product::get()->toArray();
        $products = json_decode(json_encode($products),true);
        return view ('admin.shipments.add_edit_shipment')->with(compact('title','shipmentdata','couriers','products'));
    }

    public function deleteShipment($id)
    {
        $shipment = Shipment::find($id);
        $shipment ->products()->detach();
        $shipment->delete();
        $message = 'Product has been deleted!';
        session()->flash('success_message',$message);
        return redirect()->back();
    }
}
