<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Utils\Response;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    use Response;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('Category')->get();

        return  $this->responseData($products, 'success');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $products = Product::where('name', 'like', "%$searchTerm%")
        ->orWhere('description', 'like', "%$searchTerm%")
        ->get();
        // dd($products);
        return  $this->responseData($products, 'success');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|numeric'
        ]);

        $product = Product::create($product);

        return  $this->responseData($product, 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('Category')->where('id', $id)->first();

        if ($product == null){
            return $this->responseDataNotFound('Product Tidak ditemukan',isNull($product));
        }

        return  $this->responseData($product, 'success');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|numeric'
        ]);

        $product = Product::where('id', $id)->first();

        if ($product == null) {
            return $this->responseDataNotFound('Product Tidak ditemukan',isNull($product));
        }

        $product = $product->update($request->all());

        return $this->responseData($product,'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::where('id', $id)->first();

        if ($product == null) {
            return $this->responseDataNotFound('Product Tidak ditemukan',isNull($product));
        }

        $product = $product->delete();

        return $this->responseData($product,'success');
    }
}
