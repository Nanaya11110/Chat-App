<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
 /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;
    public function definition(): array
    {
        $decry = '123';
        $bcry = Hash::make($decry);
        return [
            "name"=>$this->faker->name,
            "email"=> $this->faker->unique()->safeEmail,
            "password"=>(string)$bcry,
            "note"=>(string)$decry
        ];
    }
}
