<?php

use Illuminate\Database\Seeder;
use App\YelpRequest;

class YelpBathroomReviews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bearer_token = 'jSIDkWGFWjZ0-vnKrnPZFL0-gLS1kJxh4mls_8By6MT0izX3RY2TQIzxjf9QF0gl5RY0OQKiNzoRYRfyZApJI_ve7KK1VWb4mndmYR7WykwUA9746qDMbZ8ugkBPWXYx';
	    $host = 'https://api.yelp.com';
	    $path = '/v3/businesses/search';
	    $url_params = array('categories' => 'food,localflavor,nightlife,restaurants,shopping',
	                        
	                        'limit' => 25,
	                        'latitude' => 30.4043357,
	                        'longitude' => -97.7213553,
	                        'radius' => 4000);


	    $locations = YelpRequest::request($bearer_token, $host, $path, $url_params);
	    
	    $locations = json_decode($locations,true);

	    $count = $locations['total'];
	    
	    $a = 0;

	    for ($i=0; $i < $count; $i += 25) { 
	    	$a++;
	        $url_params['offset'] = $i;
	        $locations = YelpRequest::request($bearer_token, $host, $path, $url_params);
	        $locations = json_decode($locations,true);

	        foreach ($locations['businesses'] as $id => $location) {
	            $review = factory(App\Review::class)->create([
        			'yelp_id' => $location['id'],
        			'location_id' => $a
        		]);
	        }
	        sleep(3);
	        
	    }
    }
}
