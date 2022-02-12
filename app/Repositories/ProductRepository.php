<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository {

    public function all(){
        return Product::orderBy('name', 'ASC')
            ->orderBy('price', 'ASC')
            ->get();
    }


    public function findByCategory($categoryId){
        $products = Product::Where('category_id', $categoryId)
            ->get();
        
            return response()->json(['status'=> 'success', 'products' => $products]);
    }

}