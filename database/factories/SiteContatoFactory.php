<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContato;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteContato::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nome' => $this->faker->name,
            'telefone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->email,
            'motivo_contato' => $this->faker->numberBetween(1, 3),
            'msg' => $this->faker->text(40)
        ];
    }
}
