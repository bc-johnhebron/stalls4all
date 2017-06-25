<?php

use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 21)->create();
        $locations = factory(App\Location::class, 100)->create();

        foreach ($locations as $location) {
        	factory(App\Review::class, 10)->create([
        			'location_id' => $location->id
        		]);

        	$photo = factory(App\Photo::class)->create([
        			'entity_id' => $location->id
        		]);
        }
    }
}