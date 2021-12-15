<?php
/**
 * Plugin Name: Pet Adoption (Custom DB Table)
 * Description: Pet name and features generator to and from a custom database table
 * Version: 1.0
 * Author: Maria D. Campbell
 * Author URI: https://www.interglobalmedianetwork.com
 *
 * @package  WordPress
 * @author   Maria D. Campbell
 * @link     http://www.interglobalmedianetwork.com/
 */

?>

<?php
/**
 * Function generate_pet generates a list of pet names and features to and from a custom database table
 *
 * @return [array]
 */
function generate_pet() {
	$species    = array( 'cat', 'dog', 'rabbit', 'bird', 'fish', 'hamster', 'guinea pig', 'mouse', 'lizard', 'hedgehog', 'goat', 'llama', 'chicken' );
	$adjectives = array( 'Amazing', 'Astonishing', 'Astounding', 'Awesome', 'Breathtaking', 'Brilliant', 'Classy', 'Cool', 'Dazzling', 'Delightful', 'Excellent', 'Exceptional', 'Exquisite', 'Extraordinary', 'Fabulous', 'Fantastic', 'Flawless', 'Glorious', 'Gnarly', 'Good', 'Great', 'Groovy', 'Groundbreaking', 'Impeccable', 'Impressive', 'Incredible', 'Laudable', 'Legendary', 'Lovely', 'Luminous', 'Magnificent', 'Majestic', 'Marvelous', 'Neat', 'Outstanding', 'Perfect', 'Phenomenal', 'Polished', 'Praiseworthy', 'Premium', 'Priceless', 'Rad', 'Remarkable', 'Riveting', 'Sensational', 'Smashing', 'Solid', 'Spectacular', 'Splendid', 'Stellar', 'Striking', 'Stunning', 'Stupendous', 'Stylish', 'Sublime', 'Super', 'Superb', 'Supreme', 'Sweet', 'Swell', 'Terrific', 'Transcendent', 'Tremendous', 'Ultimate', 'Wonderful', 'Wondrous' );
	$names      = array( 'Abby', 'Ace', 'Allie', 'Angel', 'Annie', 'Apollo', 'Archie', 'Athena', 'Baby', 'Bailey', 'Bandit', 'Baxter', 'Bear', 'Beau', 'Bella', 'Belle', 'Benji', 'Benny', 'Bentley', 'Blue', 'Bo', 'Bob', 'Bonnie', 'Boo', 'Boomer', 'Boots', 'Brady', 'Brandy', 'Brody', 'Bruno', 'Brutus', 'Bubba', 'Buddy', 'Buster', 'Cali', 'Callie', 'Casey', 'Cash', 'Casper', 'Champ', 'Chance', 'Charlie', 'Chase', 'Chester', 'Chico', 'Chloe', 'Cleo', 'Coco', 'Cocoa', 'Cody', 'Cookie', 'Cooper', 'Copper', 'Cuddles', 'Daisy', 'Dakota', 'Dexter', 'Diesel', 'Dixie', 'Duke', 'Dusty', 'Ella', 'Ellie', 'Elvis', 'Emma', 'Felix', 'Finn', 'Fluffy', 'Frankie', 'Garfield', 'George', 'Gigi', 'Ginger', 'Gizmo', 'Grace', 'Gracie', 'Gus', 'Hank', 'Hannah', 'Harley', 'Hazel', 'Heidi', 'Henry', 'Holly', 'Honey', 'Hunter', 'Izzy', 'Jack', 'Jackson', 'Jake', 'Jasmine', 'Jasper', 'Jax', 'Joey', 'Josie', 'Katie', 'Kiki', 'Kobe', 'Kona', 'Lacey', 'Lady', 'Layla', 'Leo', 'Lexi', 'Lexie', 'Lilly', 'Lily', 'Loki', 'Lola', 'Louie', 'Lucky', 'Lucy', 'Luke', 'Lulu', 'Luna', 'Mac', 'Macy', 'Maddie', 'Madison', 'Maggie', 'Marley', 'Max', 'Maya', 'Mia', 'Mickey', 'Midnight', 'Millie', 'Milo', 'Mimi', 'Minnie', 'Miss kitty', 'Missy', 'Misty', 'Mittens', 'Mocha', 'Molly', 'Moose', 'Muffin', 'Murphy', 'Nala', 'Nikki', 'Olive', 'Oliver', 'Ollie', 'Oreo', 'Oscar', 'Otis', 'Patches', 'Peanut', 'Pebbles', 'Penny', 'Pepper', 'Phoebe', 'Piper', 'Precious', 'Prince', 'Princess', 'Pumpkin', 'Rascal', 'Rex', 'Riley', 'Rocco', 'Rocky', 'Romeo', 'Roscoe', 'Rosie', 'Roxie', 'Roxy', 'Ruby', 'Rudy', 'Rufus', 'Rusty', 'Sadie', 'Salem', 'Sally', 'Sam', 'Samantha', 'Sammy', 'Samson', 'Sandy', 'Sasha', 'Sassy', 'Scooter', 'Scout', 'Shadow', 'Sheba', 'Shelby', 'Sierra', 'Simba', 'Simon', 'Smokey', 'Snickers', 'Snowball', 'Snuggles', 'Socks', 'Sophie', 'Sparky', 'Spike', 'Spooky', 'Stella', 'Sugar', 'Sydney', 'Tank', 'Teddy', 'Thor', 'Tiger', 'Tigger', 'Tinkerbell', 'Toby', 'Trixie', 'Trouble', 'Tucker', 'Tyson', 'Walter', 'Willow', 'Winnie', 'Winston', 'Zeus', 'Ziggy', 'Zoe', 'Zoey' );
	$suffix     = array( 'Senior', 'Junior', 'The Third', 'The Fourth', 'The Fifth', 'The Sixth', 'The Seventh', 'The Eighth', 'The Ninth' );
	$colors     = array( 'red', 'orange', 'yellow', 'green', 'blue', 'purple', 'pink', 'black', 'white', 'gray', 'gold', 'silver', 'bronze', 'teal', 'beige' );
	$foods      = array( 'Apple', 'Apricot', 'Asparagus', 'Avocado', 'Banana', 'Blackberry', 'Blueberry', 'Boysenberry', 'Broccoli', 'Cabbage', 'Cantaloupe', 'Carrot', 'Celery', 'Cherry', 'Cilantro', 'Clementine', 'Coconut', 'Corn', 'Cranberry', 'Cucumber', 'Dragonfruit', 'Fig', 'Garlic', 'Goji berry', 'Gooseberry', 'Grape', 'Grapefruit', 'Guava', 'Honeyberry', 'Honeydew', 'Huckleberry', 'Jackfruit', 'Kiwifruit', 'Kumquat', 'Lemon', 'Lime', 'Loquat', 'Mandarine', 'Mango', 'Marionberry', 'Mulberry', 'Nance', 'Nectarine', 'Olive', 'Onion', 'Orange', 'Papaya', 'Passionfruit', 'Peach', 'Pear', 'Persimmon', 'Pineapple', 'Plantain', 'Plum', 'Plumcot', 'Pomegranate', 'Prune', 'Raisin', 'Raspberry', 'Strawberry', 'Tamarind', 'Tangerine', 'Tomato', 'Turnip', 'Watermelon', 'Yam', 'Zucchini' );
	$hobbies    = array( 'walking', 'running', 'eating', 'sleeping', 'playing fetch', 'sunbathing', 'scratching furniture', 'destroying stuff', 'chasing stuff' );

	$combined_name = $adjectives[ wp_rand( $adjectives, 1 ) ] . ' ' . $names[ wp_rand( $names, 1 ) ] . ' ' . $suffix[ wp_rand( $suffix, 1 ) ];

	return array(
		'birthyear' => wp_rand( 2006, 2021 ),
		'petweight' => wp_rand( 1, 100 ),
		'petname'   => trim( $combined_name ),
		'species'   => $species[ wp_rand( $species, 1 ) ],
		'favcolor'  => $colors[ wp_rand( $colors, 1 ) ],
		'favfood'   => $foods[ wp_rand( $foods, 1 ) ],
		'favhobby'  => $hobbies[ wp_rand( $hobbies, 1 ) ],
	);
}
