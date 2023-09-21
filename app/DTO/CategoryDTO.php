<?php 

namespace App\DTO;

use Illuminate\Support\Facades\Validator;

class CategoryDTO
{
    public int $parent_id;
    public string $slug;
    public string $display_name;

    public function validate()
    {
        $validator = Validator::make([
            'parent_id' => $this->parent_id,
            'slug' => $this->slug,
            'display_name' => $this->display_name,
        ], [
            'parent_id' => 'required',
            'slug' => 'required',
            'display_name' => 'required',
        ]);

        return $validator->validate();
    }
}