<?php

namespace Database\Factories;

use App\Models\IdolActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<IdolActivity>
 */
class IdolActivityFactory extends Factory
{
    protected $model = IdolActivity::class;

    private array $idolNames = [
        'IU', 'BLACKPINK', 'BTS', 'IVE', 'NewJeans',
        'TWICE', 'SEVENTEEN', 'EXO', 'NCT DREAM', 'LE SSERAFIM',
        'aespa', 'Stray Kids', 'ITZY', 'Red Velvet', 'SHINee',
        'MONSTA X', 'GOT7', 'BIGBANG', 'Super Junior', 'f(x)',
        'MAMAMOO', 'SISTAR', 'AOA', 'KARA', 'T-ARA',
        'Wanna One', 'IOI', 'Produce 101', 'ENHYPEN', 'TXT',
    ];

    private array $activityNames = [
        'World Tour Concert',
        'Fan Meeting Event',
        'Comeback Showcase',
        'Online Fan Concert',
        'Music Festival Performance',
        'Award Show Performance',
        'Reality TV Show Appearance',
        'Variety Show Guest',
        'Drama OST Promotion',
        'Album Launch Live',
        'Anniversary Concert',
        'Summer Concert',
        'Idol Olympics Special',
        'Year-End Gala',
        'Solo Concert Tour',
        'Collab Live Stage',
        'Behind the Scenes Special',
        'Charity Fan Meeting',
        'Outdoor Festival Stage',
        'Weekly Live Streaming Session',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['Upcoming', 'Finished']);

        // Upcoming = future date, Finished = past date
        $activityDate = $status === 'Upcoming'
            ? $this->faker->dateTimeBetween('now', '+6 months')->format('Y-m-d')
            : $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d');

        return [
            'idol_name'      => $this->faker->randomElement($this->idolNames),
            'activity_name'  => $this->faker->randomElement($this->activityNames),
            'category'       => $this->faker->randomElement(['Concert', 'Variety Show', 'Drama', 'Fan Meeting', 'Live Streaming']),
            'activity_date'  => $activityDate,
            'duration_hours' => $this->faker->numberBetween(1, 5),
            'viewer_count'   => $this->faker->numberBetween(500, 2000000),
            'status'         => $status,
        ];
    }
}
