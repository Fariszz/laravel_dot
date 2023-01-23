<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Utils\Response;

use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{
    use Response;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return  $this->responseData($categories, 'success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $category = Category::create($request->all());

        return  $this->responseData($category, 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::whereId($id)->first();

        if ($category == null) {
            return $this->responseDataNotFound('Category', isNull($category));
        }
        
        return  $this->responseData($category, 'success');
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
            'name' => 'required|string'
        ]);

        $category = Category::whereId($id)->first();

        if ($category == null) {
            return $this->responseDataNotFound('Category', isNull($category));
        }

        $category = $category->update($request->all());

        return $this->responseData($category,'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::where('id', $id)->first();

        if ($category == null) {
            return $this->responseDataNotFound('Category', isNull($category));
        }

        $category = $category->delete();

        return $this->responseData($category,'success');
    }
}
