<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Session;
use Image;

class ProductsController extends Controller
{
    public function products()
    {
        Session::put('page', 'products');
        $products = Product::with('shipments')->get();
         /*echo "<pre>"; print_r($products); die;*/
        $products = json_decode(json_encode($products));
        return view('admin.products.products')->with(compact('products'));
    }
    public function addEditProduct( Request $request, $id=null)
    {
        if($id=="")
        {
            $title = "Add Product";
            $product = new  Product();
            $productdata = array();
            $message = "Product has been added successfully!";
            //Add Product
        }
        else
        {
            $title = "Edit Product";
            $productdata = Product::find($id);
            $productdata = json_decode(json_encode($productdata),true);
            $product = Product::find($id);
            $message = "Product has been updated successfully!";
            //Edit Product
        }
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            // Validation
            $rules = [
                'name' => 'required',
                'image' => 'required'
            ];
            $customMessages = [
                'name.required' => 'Name is required',
                'image.required' => ' Image is required',
            ];
            $this->validate($request,$rules,$customMessages);
            //Upload Product image
            if($request->hasFile('image'))
            {
                $image_tmp = $request->file('image');
                if($image_tmp->isValid())
                {
                    // Get Original image name
                    $image_name = $image_tmp->getClientOriginalName();
                    //Get Image extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $imageName = $image_name.'.'.rand(111,99999).'.'.$extension;
                    //Set path for every size
                    $small_image_path = 'images/product_images/small/'.$imageName;
                    Image::make($image_tmp)->resize(250,250)->save($small_image_path);
                    //Save image in the product table
                    $product->image = $imageName;
                }
            }
            $product->name = $data['name'];
            $product->save();
            session::flash('success_message',$message);
            return redirect('admin/products');
        }
        return view ('admin.products.add_edit_product')->with(compact('title','productdata'));
    }
    public function deleteProduct($id)
    {
        //Delete Product
        Product::where('id',$id)->delete();
        $message = 'Product has been deleted!';
        session()->flash('success_message',$message);
        return redirect()->back();
    }

}
