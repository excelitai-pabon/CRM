<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

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
            'file_no' => $this->faker->unixTime(),
            'member_name' => $this->faker->name(),
            'father_name' => $this->faker->name(),
            'mother_name' => $this->faker->name(),
            'husband_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'permanent_address' => $this->faker->address(),
            'mailing_address' => $this->faker->address(),
            'phone_no_1' => $this->faker->phoneNumber(),
            'phone_no_2' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date($format = 'Y-m-d'),
            'national_id' => $this->faker->randomDigit(),
            'profession' => $this->faker->word(),
            'office_address' => $this->faker->address(),
            'designation' => $this->faker->word(),
            'nominee_name' => $this->faker->name(),
            'relation_with_mominee' => $this->faker->word(),
            'building_no' => $this->faker->randomDigit(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
