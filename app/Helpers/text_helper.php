<?php

// use NumberFormatter;

function  trimmed(string $str): string
{
	return str_replace(' ', '', $str);
}




function randomNumber(int $size)
{
	return random_string('numeric', $size);
}


function randomString()
{
	//The integer value here SHOULD NOT be changed
	return random_string('alnum', 42);
}

function printer($array)
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function generatePassword(): string
{
	$cities = ['London', 'Paris', 'NewYork', 'Tokyo', 'Sydney', 'Berlin', 'Rome', 'Moscow', 'Cairo', 'Delhi', 'Beijing', 'Rio', 'Toronto', 'Mumbai', 'Seoul', 'Athens', 'Amsterdam', 'Dublin', 'Lisbon', 'Vienna', 'Oslo', 'Stockholm', 'Prague', 'Warsaw', 'Budapest', 'Brussels', 'Helsinki', 'Copenhagen', 'KualaLumpur', 'Bangkok', 'Singapore', 'Jakarta', 'Manila', 'Hanoi', 'Wellington', 'Canberra', 'Washington', 'Brasilia', 'BuenosAires', 'Santiago'];

	$animals = ['Lion', 'Tiger', 'Elephant', 'Giraffe', 'Kangaroo', 'Monkey', 'Gorilla', 'Zebra', 'Hippopotamus', 'Rhino', 'Crocodile', 'Panda', 'Koala', 'Leopard', 'Cheetah', 'Wolf', 'Bear', 'Fox', 'Deer', 'Squirrel', 'Owl', 'Eagle', 'Falcon', 'Peacock', 'Parrot', 'Swan', 'Flamingo', 'Penguin', 'Dolphin', 'Whale', 'Shark', 'Octopus', 'Seahorse', 'Butterfly', 'Bee', 'Ladybug', 'Spider', 'Scorpion', 'Gazelle', 'Turtle'];

	$birds = ['Sparrow', 'Robin', 'BlueJay', 'Cardinal', 'Hummingbird', 'Finch', 'Eagle', 'Hawk', 'Owl', 'Woodpecker', 'Pigeon', 'Peacock', 'Parrot', 'Swan', 'Duck', 'Goose', 'Turkey', 'Flamingo', 'Penguin', 'Emu', 'Albatross', 'Seagull', 'Cockatoo', 'Canary', 'Cuckoo', 'Crow', 'Ostrich', 'Pelican', 'Toucan', 'Kiwi', 'Songbird', 'Quail', 'Quetzal', 'Kingfisher', 'Vulture', 'Crane', 'Heron', 'Ibis', 'Magpie', 'Stork'];

	$carBrands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'BMW', 'Mercedes', 'Audi', 'Volvo', 'Hyundai', 'Kia', 'Nissan', 'Mazda', 'Subaru', 'Jeep', 'Ferrari', 'Lamborghini', 'Porsche', 'Tesla', 'Jaguar'];

	$flowers = ['Rose', 'Lily', 'Tulip', 'Sunflower', 'Orchid', 'Daisy', 'Jasmine', 'Peony', 'Lotus', 'Carnation', 'Daffodil', 'Hibiscus', 'CherryBlossom', 'Bluebell', 'Poppy', 'Lavender', 'Dandelion', 'Marigold', 'Iris', 'Violet'];

	$words = array_merge($cities, $animals, $birds, $carBrands, $flowers);

	$specialChars = ['$', '@'];

	$randomCity = $words[array_rand($words)];
	$randomSpecialChar = $specialChars[array_rand($specialChars)];
	$randomDigits = rand(100, 9999);

	$password = $randomCity . $randomSpecialChar . $randomDigits;

	return $password;
}
