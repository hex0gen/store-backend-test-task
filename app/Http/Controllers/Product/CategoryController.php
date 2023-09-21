<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\CategoryDTO;
use App\Models\Product\Category;

class CategoryController extends Controller
{
    public function list()
    {
        // Получить список всех категорий
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function store(Request $request)
    {
        // Создание объекта DTO
        $categoryDTO = new categoryDTO();
        $categoryDTO->parent_id = $request->input('parent_id');
        $categoryDTO->slug = $request->input('slug');
        $categoryDTO->display_name = $request->input('display_name');


        // Создание нового категории
        $category = $this->createCategoryFromDTO($categoryDTO);

        return response()->json($category, 201);
    }

    public function update(Request $request, Category $category)
    {
        // Создание объекта DTO
        $categoryDTO = new categoryDTO();
        $categoryDTO->parent_id = $request->input('parent_id');
        $categoryDTO->slug = $request->input('slug');
        $categoryDTO->display_name = $request->input('display_name');

        // Обновление категории
        $this->updateCategoryFromDTO($category, $categoryDTO);

        return response()->json($category, 200);
    }

    // Метод для создания категории из DTO
    private function createCategoryFromDTO(categoryDTO $categoryDTO)
    {
        $image_path = 'https://placehold.co/200';

        // Создание нового категории
        return Category::create([
            'parent_id' => $categoryDTO->parent_id,
            'slug' => $categoryDTO->slug,
            'display_name' => $categoryDTO->display_name
        ]);
    }

    // Метод для обновления категории из DTO
    private function updateCategoryFromDTO(Category $category, categoryDTO $categoryDTO)
    {
        $image_path = 'https://placehold.co/200';
        if ($categoryDTO->validate()){
            // Обновление полей категории
            $category->parent_id = $categoryDTO->parent_id;
            $category->slug = $categoryDTO->slug;
            $category->display_name = $categoryDTO->display_name;
    
            $category->save();
        }
    }

    public function destroy(Category $category)
    {
        // Удаление категории
        $category->delete();
        return response()->json(null, 204);
    }
}
