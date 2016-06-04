# SmartUI::Carousel Class
This is a basic usage of SmartUI's ```Carousel``` class. If you want to know more about the real HTML layout, click [here](general-elements.php)
```php
SmartUI::Carousel($items [, $style = 'slide', $options = array()])
```

## $items
The ```$items``` parameter will initiate the number of items displayed in the carousel. You can pass either an ```assoc``` array that contains item names or just an ```array```.
```php
$items = array(
	ASSETS_URL."/img/demo/m3.jpg",
	ASSETS_URL."/img/demo/m1.jpg",
	ASSETS_URL."/img/demo/m2.jpg",
);

// or ...
$items = array(
	'item1' => ASSETS_URL."/img/demo/s1.jpg",
	'item2' => array(
		'img' => ASSETS_URL."/img/demo/s2.jpg",
		'caption' => 
			'<h4>S2 Background Image</h4>
			<p>
				Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
			</p>
			<br>
			<a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>'
	),
	'item3' => array(
		'img' => array(
			'src' => ASSETS_URL."/img/demo/s3.jpg",
			'alt' => 'This is s3 image'
		)
	)
)
```

## Setup
```php
$ui = new SmartUI;

$items = array(
	ASSETS_URL."/img/demo/m3.jpg",
	ASSETS_URL."/img/demo/m1.jpg",
	ASSETS_URL."/img/demo/m2.jpg",
);

$carousel = $ui->create_carousel($items);
```

## Usage
```
$carousel->caption(0, '<h4>Title 1</h4>
	<p>
		Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
	</p>
	<br>
	<a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>'
);
```
If you passed the ```items``` array with no specified keys, you'l use the array's indexes instead to set ```caption```, ```active```, etc.
```php
$carousel->caption(0, ...); // we specify item #0's caption property
```

## Print it!
```php
$carousel->print_html();
```

## Property Reference
Below are the list of available properties for the class:

### Carousel::item
An ```array``` - The list of items (provided upon creation of ```SmartUI::Carousel```)
```php
$carousel->item(0, array('img' => ASSETS_URL."/img/demo/m3.jpg", 'caption' => 'this is the caption ...'));

// or ...
$carousel->item(0, ASSETS_URL."/img/demo/m3.jpg"); // we set the image only for item #0
```

### Carousel::id
A ```string``` - ID attribute of your carousel instance

### Carousel::active
An ```array``` - List of items and their ```active``` property
```php
$carousel->active(1, true); // set's item #1 to be the first active item
```

### Carousel::caption
An ```array``` - List of items and their ```caption``` property
```php
$carousel->caption(0, 'This is the content of item #0');
```

### Carousel::img
An ```array``` - List of items and their ```img``` property. The ```img``` property may contain ```string``` or ```array```.
```
$img_property = array(
	'src' => '',
	'alt' => ''
);

// sample call ...
$carousel->img(0, ASSETS_URL."/img/demo/my_new_image.jpg"); // set as string, directed to the img's src property

// or ...
$carousel->img(0, array( // by using array
	'src' => ASSETS_URL."/img/demo/my_new_image.jpg",
	'alt' => 'This is the alt attribute of the image'
));
```

### Carousel::options
An ```array``` - Available options of the class
```php
$options = array(
	'style' => 'slide', // default
	'controls' => array('<span class="glyphicon glyphicon-chevron-left"></span>', '<span class="glyphicon glyphicon-chevron-right"></span>') // default
);

// sample call ...
$carousel->options('controls', false) // we remove the controls!
	->options('style', 'fade') // change animation style to fade!
```