<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function product()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $categories = category::all();
                return view('admin.product')->with(['categories' => $categories]);;
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    public function category()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $categories = category::all();
                return view('admin.category')->with(['categories' => $categories]);;
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function upload_product(Request $request)
    {
        $data = new Product();

        $image = $request->file;
        $imagename = time() . "." . $image->getClientOriginalExtension();
        $request->file->move('product_image', $imagename);

        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->quantity;
        $data->categories_id = $request->get('category');

        $data->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function upload_category(Request $request)
    {
        $data = new category();


        $data->category = $request->get('category');

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function delete_product($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $data = Product::find($id);
        return view('admin.update_product', compact('data'));
    }

    public function update_product_save(Request $request, $id)
    {
        $data = Product::find($id);

        $image = $request->file;
        if ($image) {
            $imagename = time() . "." . $image->getClientOriginalExtension();
            $request->file->move('product_image', $imagename);

            $data->image = $imagename;
        }
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function update_status($id)
    {
        $order = Order::find($id);
        $order->status = "Delivered";
        $order->save();

        return redirect()->back();
    }

    public function show_product()
    {
        $data = Product::all();
        return view('admin.show_product', compact('data'));
    }
}
