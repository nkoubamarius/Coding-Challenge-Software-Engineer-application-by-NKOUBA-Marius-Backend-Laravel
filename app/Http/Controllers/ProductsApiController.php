<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductsApiController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    public function index(){
        return $this->productRepository->all();
    }

    public function filterProductsByCategory($categoryId){
        return $this->productRepository->findByCategory($categoryId);
    }


    public function store(){
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
    
        return Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'category_id' => request('category_id'),
        ]);
    }


    public function update(Product $product){
        $success = $product->update([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'category_id' => request('category_id'),
        ]);
    
        return [
            'success'=> $success 
        ];
    }

    public function destroy(Product $product){
        $success = $product->delete();

        return [
            'success'=> $success 
        ];
    }


}
