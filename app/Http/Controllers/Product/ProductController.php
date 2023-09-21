<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\ProductDTO;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function list()
    {
        // Получить список всех продуктов
        $products = Product::all();
        return response()->json($products);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function store(Request $request)
    {
        // Создание объекта DTO
        $productDTO = new ProductDTO();
        $productDTO->name = $request->input('name');
        $productDTO->price = $request->input('price');
        $productDTO->image_path = 'https://placehold.co/200';
        $productDTO->description = $request->input('description');
        $productDTO->is_available = $request->input('is_available');


        // Создание нового продукта
        $product = $this->createProductFromDTO($productDTO);

        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        // Создание объекта DTO
        $productDTO = new ProductDTO();
        $productDTO->name = $request->input('name');
        $productDTO->price = $request->input('price');
        $productDTO->image_path = 'https://placehold.co/200';
        $productDTO->description = $request->input('description');
        $productDTO->is_available = $request->input('is_available');

        // Обновление продукта
        $this->updateProductFromDTO($product, $productDTO);

        return response()->json($product, 200);
    }

    // Метод для создания продукта из DTO
    private function createProductFromDTO(ProductDTO $productDTO)
    {
        $image_path = 'https://placehold.co/200';

        // Создание нового продукта
        return Product::create([
            'name' => $productDTO->name,
            'price' => $productDTO->price,
            'image_path' => $image_path,
            'description' => $productDTO->description,
            'is_available' => $productDTO->is_available,
        ]);
    }

    // Метод для обновления продукта из DTO
    private function updateProductFromDTO(Product $product, ProductDTO $productDTO)
    {
        $image_path = 'https://placehold.co/200';
        if ($productDTO->validate()){
            // Обновление полей продукта
            $product->name = $productDTO->name;
            $product->price = $productDTO->price;
            $product->description = $productDTO->description;
            $product->is_available = $productDTO->is_available;
            $product->image_path = $image_path;
    
            $product->save();
        }
    }

    public function destroy(Product $product)
    {
        // Удаление продукта
        $product->delete();
        return response()->json(null, 204);
    }
}
