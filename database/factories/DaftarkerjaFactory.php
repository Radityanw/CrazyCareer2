<?php

namespace Database\Factories;

use App\Models\Daftarkerja;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DaftarkerjaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Daftarkerja::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(5, 7));
        $datetime = $this->faker->dateTimeBetween('-1 month', 'now');

        $content = '';
        for($i=0; $i < 5; $i++) {
            $content .= '<p class="mb-4">' . $this->faker->sentences(rand(5, 10), true) . '</p>';
        }

        return [
            
            'title' => $title,
            'slug' => Str::slug($title) . '-' . rand(1111, 9999),
            'company' => $this->faker->company,
            'type' => $this->faker->randomElement(['Job', 'Courses']),
            'logo' => basename($this->faker->image(storage_path('app/public'))),
            'is_highlighted' => (rand(1, 9) > 7),
            'is_active' => true,
            'content' => $content,
            'apply_link' => $this->faker->url,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}