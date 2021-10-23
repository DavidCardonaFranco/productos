<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\api\v1\ProductStoreRequest;
use App\Http\Requests\api\v1\ProductUpdateRequest;
use App\Http\Resources\v1\ProductCollection;
use App\Http\Resources\v1\ProductResource;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->paginate();

        /* return response()->json(['data' => $products], 200); */
        
        return ProductResource::collection($products);

        /* return (new ProductCollection($products))
            ->response()
            ->setStatusCode(200); */
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->all());

        return response()->json(['data' => $product], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        /* return response()->json(['data' => $product], 200); */
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->all());

        return response()->json(['data' => $product], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response(null, 204);
    }
}
