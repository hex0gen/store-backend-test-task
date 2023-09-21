<?php 

namespace App\DTO;

use Illuminate\Support\Facades\Validator;

class ProductDTO
{
    public string $name;
    public float $price;
    public string $image_path;
    public string $description;
    public bool $is_available;

    public function validate()
    {
        $validator = Validator::make([
            'name' => $this->name,
            'price' => $this->price,
            'image_path' => $this->image_path,
            'description' => $this->description,
            'is_available' => $this->is_available,
        ], [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            // 'image_path' => 'required|image|mimes:jpeg,png,jpg,gif',
            'image_path' => 'required',
            'description' => 'required|string',
            'is_available' => 'required',
        ]);

        return $validator->validate();
    }


}