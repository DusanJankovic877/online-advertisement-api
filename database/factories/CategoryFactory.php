<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    private $categories = [
        'Clothing', 
        'Tools', 
        'Sports', 
        'Accessories', 
        'Furniture', 
        'Pets', 
        'Games', 
        'Books',
        'Technology'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            return [
                'title' => 'Technology'
            ];
        }

}
