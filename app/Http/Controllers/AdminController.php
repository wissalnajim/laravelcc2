<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\Order;

use App\Models\Category;

use PDF;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            return view('admin.product');
        }
        else{
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request)
    {
        $data=new product;

        $image=$request->file;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->file->move('productimage',$imagename);

        $data->image=$imagename;

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description = $request->description;

        $data->quantity=$request->quantity;

        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');



        
    }

    public function showproduct()
    {
        $data=product::all();

        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {

        $data=product::find($id);

        $data->delete();

        return redirect()->back()->with('message','Product Deleted ');
    }
    public function updateview($id)
    {
        $data=product::find($id);
        return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request ,$id)
    {
        $data=product::find($id);

        $image=$request->file;

        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('productimage',$imagename);

        $data->image=$imagename;

    }

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description = $request->description;

        $data->quantity=$request->quantity;

        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully');


    }

    public function showorder()
    {
        $order=order::all();
        return view('admin.showorder', compact('order'));
    }

    public function updatestatus($id)
    {
        $order=order::find($id);

        $order->status='delivered';

        $order->save();

        return redirect()->back();
    }
    public function view_category()
    {
        $category=category::all();
        return view('admin.category',compact('category'));
    }
    public function add_category(Request $request)
    {
        $category=new category;

        $category->category_name=$request->category;

        $category->save();

        return redirect()->back()->with('message','Category Added Successfully');

    }
    public function delete_category($id)
    {
        $category=category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Delete Successfully');
    }
    public function print_pdf($id)
    {

        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
    }
}
