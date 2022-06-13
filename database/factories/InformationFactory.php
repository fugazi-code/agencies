<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'        => '',
            'national_id'    => $this->faker->bankAccountNumber,
            'name'           => $this->faker->company,
            'tin'            => $this->faker->bankAccountNumber,
            'address_line_1' => $this->faker->address,
            'address_line_2' => $this->faker->address,
            'city'           => $this->faker->city,
            'zip_code'       => $this->faker->postcode,
            'contact_name'   => $this->faker->name,
            'phone'          => $this->faker->phoneNumber,
            'fax'            => $this->faker->phoneNumber,
            'email'          => $this->faker->companyEmail,
            'status'         => 'active',
            'type'           => $this->faker->postcode,
            'created_by'     => '1',
        ];
    }
}
