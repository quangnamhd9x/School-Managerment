<?php

namespace Database\Factories;

use App\Models\RoleConstants;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make("123"), // password
            'role_id' => RoleConstants::ROLE_ADMIN,
            'status' => 1,
            'email' => 'quangnamhd9x@gmail.com',
            'phone' => '0966625608',
        ];
    }
}
