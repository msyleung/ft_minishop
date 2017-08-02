<?PHP
session_start();

function init_product($stock) {
	$stock[] = array("id" => "01",
		"name" => "Meow Mix",
		"price" => "100",
		"img" => "<img src='./img/meow_mix.jpg' height=200px width=200px>",
		"food" => "1",
		"toy" => "0",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "02",
		"name" => "Cat Bed",
		"price" => "10",
		"img" => "<img src='./img/cat_bed.jpg' height=200px width=200px>",
		"food" => "0",
		"toy" => "0",
		"utilities" => "1",
		"furniture" => "1"
	);
	$stock[] = array("id" => "03",
		"name" => "Cat Litter",
		"price" => "10000",
		"img" => "<img src='./img/cat_litter.jpg' height=200px width=200px>",
		"food" => "0",
		"toy" => "0",
		"utilities" => "1",
		"furniture" => "0"
	);
	$stock[] = array("id" => "04",
		"name" => "Scratching Post",
		"price" => "24",
		"img" => "<img src='./img/scratch_post.jpg' height=200px width=200px>",
		"food" => "0",
		"toy" => "1",
		"utilities" => "0",
		"furniture" => "1"
	);
	$stock[] = array("id" => "05",
		"name" => "Bird Cage",
		"price" => "36",
		"img" => "<img src='./img/bird_cage.jpeg' height=200px width=200px>",
		"food" => "0",
		"toy" => "1",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "06",
		"name" => "Box with Holes",
		"price" => "2",
		"img" => "<img src='./img/box_with_holes.jpeg' height=200px width=200px>",
		"food" => "0",
		"toy" => "1",
		"utilities" => "1",
		"furniture" => "0"
	);
	$stock[] = array("id" => "07",
		"name" => "Plastic Scratching Post",
		"price" => "15",
		"img" => "<img src='./img/scratch_post_plastic.jpeg' height=200px width=200px>",
		"food" => "0",
		"toy" => "1",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "08",
		"name" => "Wellness Center",
		"price" => "185",
		"img" => "<img src='./img/spa.jpeg' height=200px width=200px>",
		"food" => "0",
		"toy" => "0",
		"utilities" => "0",
		"furniture" => "1"
	);
	$stock[] = array("id" => "09",
		"name" => "Cat Toilet",
		"price" => "56",
		"img" => "<img src='./img/cat_toilet.jpeg' height=200px width=200px>",
		"food" => "0",
		"toy" => "0",
		"utilities" => "1",
		"furniture" => "1"
	);
	$stock[] = array("id" => "10",
		"name" => "Potted Plant Litter Box",
		"price" => "42",
		"img" => "<img src='./img/plant_litter.jpeg' height=200px width=200px>",
		"food" => "0",
		"toy" => "0",
		"utilities" => "1",
		"furniture" => "1"
	);
	$stock[] = array("id" => "11",
		"name" => "Cat Tree Mansion",
		"price" => "871",
		"img" => "<img src='./img/cat_tree.jpeg' height=200px width=200px>",
		"food" => "0",
		"toy" => "1",
		"utilities" => "1",
		"furniture" => "1"
	);
	$stock[] = array("id" => "12",
		"name" => "Cat Nip",
		"price" => "1",
		"img" => "<img src='./img/cat_nip.jpeg' height=200px width=200px>",
		"food" => "1",
		"toy" => "1",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "13",
		"name" => "Purina One",
		"price" => "15",
		"img" => "<img src='./img/cat_food1.jpg' height=200px width=200px>",
		"food" => "1",
		"toy" => "0",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "14",
		"name" => "9 Lives",
		"price" => "9",
		"img" => "<img src='./img/cat_food3.jpg' height=200px width=200px>",
		"food" => "1",
		"toy" => "0",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "15",
		"name" => "Hill's",
		"price" => "13",
		"img" => "<img src='./img/cat_food2.jpg' height=200px width=200px>",
		"food" => "1",
		"toy" => "0",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "16",
		"name" => "Fancy Feast",
		"price" => "30",
		"img" => "<img src='./img/cat_food4.jpg' height=200px width=200px>",
		"food" => "1",
		"toy" => "0",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "17",
		"name" => "Bergan Turbo Scratcher",
		"price" => "11",
		"img" => "<img src='./img/cat_toy1.jpg' height=200px width=200px>",
		"food" => "0",
		"toy" => "1",
		"utilities" => "0",
		"furniture" => "0"
	);
	$stock[] = array("id" => "18",
		"name" => "Pet Zone Fly",
		"price" => "10",
		"img" => "<img src='./img/cat_toy2.jpg' height=200px width=200px>",
		"food" => "0",
		"toy" => "1",
		"utilities" => "0",
		"furniture" => "0"
	);
	return $stock;
}

if (!file_exists("./shop/stock")) {
	$stock = array();
	$stock = init_product($stock);
	if (file_put_contents("./shop/stock", serialize($stock)) == FALSE)
		echo "Error: Could not initialize products\n";
}
else
	$stock = unserialize(file_get_contents("./shop/stock"));
?>
