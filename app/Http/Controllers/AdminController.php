<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function categorie(){
        $categories=Categorie::all();
        return view('admin.categorie',compact('categories'));
    }
    public function AddCategorie(Request $request) {
        $categorie =new Categorie();
        $request->validate([
            'categorie'=>'required|string|max:255',
        ]);
        $categorie::create([
            $categorie->categorie_name=$request->categorie,
        ]);
        // $categorie->categorie_name=$request->categorie;
        // $categorie->save();
        toastr()->closeButton()->addSuccess('Gategory added successfuly');
        return redirect()->back();

    }
    public function DeleteCategorie($id){
        $categorie=Categorie::find($id);
        $categorie->delete();
        return redirect()->back();
    }
    public function EditCategorie($id){
        $categories=Categorie::find($id);
        return view('admin.edit_category',compact('categories'));
    }
    public function UpdateCategorie(Request $request, $id)
{
    $request->validate([
        'categorie' => 'required|string|max:255',
    ]);

    $category = Categorie::find($id);

    if (!$category) {
        return redirect()->back()->with('error', 'Category not found');
    }

    $category->update([
        'categorie_name' => $request->input('categorie'),
    ]);
    return redirect('/admin/categorie')->with('success', 'Category updated successfully');
}

    public function AddProduct(){
        $category=Categorie::all();
        return view('admin.add_product',compact('category'));
    }
    public function StoreProduct(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        'price' => 'required|numeric',
        'category' => 'required|string',
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }

    // Create a new product instance and save to the database
    $product = new Product();
    $product->title = $request->input('title');
    $product->description = $request->input('description');
    $product->image = $imageName;
    $product->price = $request->input('price');
    $product->quantity=$request->input('quantity');
    $product->category = $request->input('category');
    $product->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Product added successfully');
}
public function ShowProducts()
{
    $products = Product::paginate(4);
    return view('admin.show_product', compact('products'));
}
public function DeleteProduct($id){
    $product=Product::find($id);
    $product->delete();
    toastr()->closeButton()->addSuccess('product deleted successfuly');

    return redirect()->back();

}
public function EditProduct($id){
    $category=Categorie::all();
    $product=Product::find($id);
    return view('admin.edit_product',compact('category','product'));
}
public function UpdateProduct(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048', // image is not required for update
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category' => 'required|string',
    ]);

    // Find the product by ID
    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found');
    }

    // Handle file upload
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Delete the old image if a new image is uploaded
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        $product->image = $imageName;
    }

    // Update product details
    $product->title = $request->input('title');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->quantity = $request->input('quantity');
    $product->category = $request->input('category');
    $product->save();

    // Redirect back with a success message
    return redirect('/admin/products')->with('success', 'Product updated successfully');
}
public function SearchProduct(Request $request)
{
    $search=$request->search;
    $products=Product::where('title','LIKE','%'.$search.'%')->paginate(4);
    return view('admin.show_product', compact('products'));


}
public function ShowOrders(){
    $orders=Order::paginate(2);
    return view('admin.orders',compact('orders'));
}
public function Orders_Accept($id){
    $order=Order::find($id);
    $order->status='accepted';
    $order->save();
    return redirect()->back();
}
public function Orders_Refused($id){
    $order=Order::find($id);
    $order->status='refused';
    $order->save();
    return redirect()->back();
}
public function print_pdf($id){
    $order=Order::find($id);
    $pdf = Pdf::loadView('admin.invoice',compact('order'));
    return $pdf->download('invoice.pdf');

}




}

