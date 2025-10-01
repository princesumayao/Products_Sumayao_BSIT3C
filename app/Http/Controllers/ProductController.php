<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $products = request()->session()->get('products', []);

        $search = request()->input('search');

        if (!empty($search)) {
            $filtered = [];

            foreach ($products as $product) {
                if (strpos(strtolower($product['product_name']), strtolower($search)) !== false) {
                    $filtered[] = $product;
                }
            }

            $products = $filtered;
        }

        return view('ProductInfo', compact('products'));
    }

    public function addList(){
        request()->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
        ]);

        $products = request()->session()->get('products', []);

        $products[] = [
            'product_id' => request()->product_id,
            'product_name' => request()->product_name,
            'product_category' => request()->product_category,
            'product_quantity' => request()->product_quantity,
            'product_price' => request()->product_price,
        ];

        request()->session()->put('products', $products);

        return redirect()->route('product.list');
    }

    public function editList(Request $request, $index)
    {
        $products = request()->session()->get('products', []);

        if (!isset($products[$index])) {
            return redirect()->route('product.list')->with('error', 'Product not found.');
        }

        $product = $products[$index];
        return view('ProductInfoEdit', compact('product', 'index'));
    }

    public function updateList(Request $request, $index)
    {
        $request->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'product_category' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
        ]);

        $products = $request->session()->get('products', []);

        if (isset($products[$index])) {
            $products[$index] = [
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_category' => $request->product_category,
                'product_quantity' => $request->product_quantity,
                'product_price' => $request->product_price,
            ];
            request()->session()->put('products', $products);
        }

        return redirect()->route('product.list')->with('success', 'Product updated successfully.');
    }

    public function deleteList(Request $request, $index)
    {
        $products = $request->session()->get('products', []);

        if (isset($products[$index])) {
            unset($products[$index]);
            $request->session()->put('products', array_values($products));
        }

        return redirect()->route('product.list')->with('success', 'Product deleted successfully.');
    }
}
