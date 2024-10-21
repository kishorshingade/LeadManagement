<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Customers;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $customers = Customers::orderBy('id', 'desc')->get();
            if ($customers) {
                return view('customers.index');
            }
        }
        return Response::json(['data' => 'Unauthorized'], 401);
    }

    public function getCustomersTableData(Request $request)
    {
        $data = Customers::when($request->has('search'), function ($query) use ($request) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('created_at', 'like', '%' . $search . '%');
            });
        })
            ->orderBy('id', 'desc')
            ->get();


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<a href="customers/' . $row->id . '" class="edit-link btn btn-info btn-sm mx-2" data-id="' . $row->id . '">View</a>' .
                    '<a href="customers/' . $row->id . '" class="edit-link btn btn-warning btn-sm mx-2" data-id="' . $row->id . '">Edit</a>' .
                    '<a href="#" class="delete-link btn btn-danger btn-sm delete-customer" data-id="' . $row->id . '" data-route="customers/' . $row->id . '">Delete</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'image_array.*' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $duplicateProduct = Customers::where('email', $request->email)->first();


        if ($duplicateProduct) {
            return response()->json(['status' => false,  'message' => 'A product with the same category and subcategory already exists.'], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customers::find($id);
        if (!$customer) {
            return redirect()->route('customers.index');
        }
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customers::find($id);
        if (!$customer) {
            return redirect()->route('customers.index');
        }
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Customers::findOrFail($id);

        if (!$product) {
            return redirect()->route('products.index');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string', 'category_id' => 'required|integer|exists:categories,id', 'sub_category_id' => 'nullable|integer|exists:subcategories,id', 'brand_id' => 'nullable|integer|exists:brands,id', 'description' => 'nullable|string', 'stock' => 'required|integer', 'actual_price' => 'required|numeric', 'selling_price' => 'required|numeric', 'status' => 'required|in:0,1',
            'is_featured' => 'required|in:0,1', 'is_hot_deal' => 'required|in:0,1', 'is_special_offer' => 'required|in:0,1',
            'hot_deal_coupon_id' => 'nullable|exists:discount_coupons,id', 'special_offer_coupon_id' => 'nullable|exists:discount_coupons,id',
        ]);
        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $duplicateProduct = Customers::where('category_id', $request->category_id)
            ->where('sub_category_id', $request->sub_category_id)
            ->where('name', '==', $request->name)
            ->where('id', '!=', $request->id)
            ->first();

        if ($duplicateProduct) {
            return response()->json(['status' => false,  'message' => 'A product with the same category and subcategory already exists.'], 409);
        }

        $category = Category::find($request->category_id);
        $subcategory = SubCategory::find($request->sub_category_id);

        $category_name = $category ? $category->category_title : null;
        $sub_category_name = $subcategory ? $subcategory->subcategory_title : null;

        $slug = Str::slug($request->name);
        $new_product = $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'category_name' => $category_name,
            'subcategory_name' => $sub_category_name,
            'brand_id' => $request->brand_id,
            'actual_price' => $request->actual_price,
            'selling_price' => $request->selling_price,
            'status' => $request->status,
            'is_featured' => $request->is_featured,
            'is_hot_deal' => $request->is_hot_deal,
            'is_special_offer' => $request->is_special_offer,
            'special_offer_coupon_id' => $request->special_offer_coupon_id,
            'hot_deal_coupon_id' => $request->hot_deal_coupon_id,
        ]);

        if ($new_product) {
            $stock = ProductStocks::where('product_id', $id)->firstOrFail();
            $stock->update(['stock' => $request->stock]);

            $product_images = $product->product_images;
            if ($product_images[0]->url !== $product->image) {
                $product->image = $product_images[0]->url;
                $product->save();
            }

            return Response(['status' => true, 'message' => 'Product updated successfully !', 'redirect_url' => '/admin/products'], 201);
        }
        return Response(['status' => true, 'message' => 'Something went wrong !'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();

        if (!$user->hasCategory('Admin')) {
            return response()->json(['status' => false, 'message' => 'You are not authorized to delete this product.'], 401);
        }

        $product = Customers::find($id);

        if (!$product) {
            return response()->json(['status' => false, 'message' => 'Product not found.'], 404);
        }
        return response()->json(['status' => true, 'message' => 'Product deleted successfully!'], 200);
    }
}
