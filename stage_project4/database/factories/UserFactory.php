<?php

namespace Database\Factories;

use App\Models\User;  // Importation correcte de la classe User
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Le modèle associé à cette factory.
     *
     * @var string
     */
    protected $model = User::class;  // Assurez-vous d'utiliser la bonne référence

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Assurer un mot de passe sécurisé
            'role' => $this->faker->randomElement(['admin', 'commercial', 'technicien']),
            'phone' => $this->faker->phoneNumber, 
            'cin' => $this->faker->regexify('[A-Z0-9]{8}'),
        ];
    }

    /**
     * Indiquer que l'adresse email du modèle doit être non vérifiée.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
