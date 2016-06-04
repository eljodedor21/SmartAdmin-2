# SmartUI::Button Class
This is a basic usage of SmartUI's ```Button``` class. If you want to know more about the real HTML layout, click [here](buttons.php)
```php
SmartUI::Button([$content = '', $type = 'default', $options = array()])
```

## Setup
```php
$ui = new SmartUI;
$btn = $ui->create_button('Button Content', 'default');
```

## Usage
```php
$btn->attr('href' => 'http://your-url.com');
```

## Print it!
```php
$btn->print_html();
```

## Property Reference
Below are the list of available properties for the class:

### Button::options
An ```array```
```php
$options = array(
	'disabled' => false,
	'labeled' => false // must have the Button::icon property
);

// sample call
$btn->options(array('disabled'=>true, 'labeled'=>true));

// or ...
$btn->options('disabled', true)->options('labeled', true);
```

### Button::content
A ```string``` - main content of the button. You can set this upon ```SmartUI::create_button('Click Me');```
```php
$btn->content('Click Me');
```

### Button::icon
A ```string``` - icon of the button (e.g. ```fa-check```)
```php
$btn->icon('fa-check');
```

### Button::type
A ```string``` - button type (```default```, ```danger```, etc.)
```php
$btn->type('success');
```

### Button::container
A ```string``` - container of the button (e.g. ```<a ... > ... </a>```)
```
$btn->container('button');
```

### Button::size
A ```string``` - button sizes (```lg```, ```sm```, etc.)
```php
const BUTTON_SIZE_LARGE = 'lg';
const BUTTON_SIZE_SMALL = 'sm';
const BUTTON_SIZE_XSMALL = 'xs';
const BUTTON_SIZE_MEDIUM = 'md';

//sample call
$btn->size(Button::BUTTON_SIZE_LARGE);
```

### Button::attr
A ```string``` or ```closure``` or ```array``` - custom button attributes
```php
// if array
$btn->attr(array('data-some-id' => 12345)); // etc.
// or ...
$btn->attr('data-some-id', 12345)->attr('href', 'http://myurl.com')->attr('target', '_blank');
```

### Button::class
A ```string``` or ```array``` or ```closure``` - additional button class
```php
$btn->class(array('bg-color-red', 'txt-color-white'));
// or ...
$btn->class(function($btn) {
	return array('bg-color-red', 'txt-color-white');
})
```

### Button::dropdown
An ```array``` or ```closure``` - array of dropdown properties
```php
$dropdown = array(
	'items' => array(),
	'split' => array( // array or boolean or string (set to 'type' key) or closure (must return same structure array)
		'type' => $type,
		'disabled' => false,
		'dropup' => false,
		'class' => array(), // or string
		'attr' => array()
	),
	'multilevel' => false
);

// sample call
$items = array(
	'<a href="javascript:void(0);">Some action</a>',
	'<a href="javascript:void(0);">Some other action</a>',
	'-',
	array(
		'content' => '<a tabindex="-1" href="javascript:void(0);">Hover me for more options</a>',
		'submenu' => array(
			'<a tabindex="-1" href="javascript:void(0);">Second level</a>',
			array(
				'content' => '<a href="javascript:void(0);">Even More..</a>',
				'submenu' => array(
					'<a href="javascript:void(0);">3rd level</a>',
					'<a href="javascript:void(0);">3rd level</a>'
				)
			),
			'<a href="javascript:void(0);">Second level</a>',
			'<a href="javascript:void(0);">Second level</a>'
		)
	)
);

$btn->dropdown('items', $items)->dropdown('split', true);
// or ... set the dropdown's own type
$btn->dropdown('items', $items)->dropdown('split', 'success');
```

## Tips!
You can pass a ```closure``` and return an ```array``` (same way as passing the ```array``` directly) to some properties
```php
$btn->class(function($btn) {
	return array('bg-color-red', 'txt-color-white');
})
```