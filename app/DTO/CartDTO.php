<?php 

namespace App\DTO;

class CartDTO
{
    public $user_id;
    public $data = [];

    public function __construct($user_id, $data)
    {
        $this->user_id = $user_id;
        $this->data = $data;
    }

    public function validate()
    {
        // Проверка наличия пользователя
        if (empty($this->user_id)) {
            throw new \Exception('Идентификатор пользователя обязателен.');
        }

        // Проверка наличия продуктов
        if (empty($this->data)) {
            throw new \Exception('Список продуктов не может быть пустым.');
        }

        // Проверка типов данных и дополнительные правила
        foreach ($this->data as $product_id) {
            if (!is_numeric($product_id) || $product_id <= 0) {
                throw new \Exception('Неверный формат идентификатора продукта: ' . $product_id);
            }
            // Дополнительные проверки, если необходимо
        }
    }
}