# SmartUI::Accordion Class
This is a basic usage of SmartUI's ```Accordion``` class. If you want to know more about the real HTML layout, click [here](general-elements.php)
```php
SmartUI::Accordion($panels [, $options = array()])
```

## $panels
The ```$panels``` parameter will initiate the number of panels displayed. You can pass either an ```assoc``` array that contains panel ids or just an ```array```(not recomended) hense ids will be the zero base index number.
```php
$panels = array(
	'my-panel-1' => array(
		'content' => '',
		'container' => 'Collapsible Group Item #1',
		'icons' => array()
	),
	'my-panel-1' => array(
		'content' => '',
		'container' => 'Collapsible Group Item #2',
		'icons' => array(),
	)
	// so on ...
)

// or ...
$panels = array(
	'my-panel-1' => 'Collapsible Group Item #1', // value acts as the 'title' property
	'my-panel-2' => 'Collapsible Group Item #2',
	// so on ...
);

// or ...
$panels = array('Collapsible Group Item #1', 'Collapsible Group Item #2'); // panel #0 and #1 as ids
```

## Setup
```php
$ui = new SmartUI;

$mypanels = array(
	'my-panel-1' => 'Collapsible Group Item #1',
	'my-panel-2' => 'Collapsible Group Item #2',
);

$accordion = $ui->create_accordion($mypanels);
```

## Usage
```php
$accordion->content('my-panel-1', 'This is the content of my panel 1');
$accordion->content('my-panel-2', 'This is the content of my panel 2');
```

## Print it!
```php
$accordion->print_html();
```

## Property Reference
Below are the list of available properties for the class:

### Accordion::panel
An ```array``` - The list of panels (provided upon creation of ```SmartUI::Accordion```)
```php
$accordion->panel('my-panel-1', array('content' => 'The content of this panel'));

// or ...
$accordion->panel('my-panel-1', 'My panel 1'); // set as panel's 'content' property
```

### Accordion::content
An ```array``` or ```closure``` of panels with their ```content``` property.
```php
$accordion->content = array(
	'my-panel-1' => 'This is the content of my panel 1'
);

// or ...
$accordion->content('my-panel-1', 'This is the content of my panel 1');

// or even closure with callback (optional)
$accordion->content('my-panel-1', function($this, $panels) {
	return 'This is the content of my panel and I am coding some stuff here to return';
}, function($this) {
	// your callback code here ...
})
```
Below other properties that are using the same setup as ```Accordion::content``` property
### Accordion::icons
An ```array``` or ```closure``` - Accordion needs ```TWO``` icons (collapsed and expanded icons). We can specify this by passing an ```array``` of the two icons
```
$accordion->icons('my-panel-2', array('fa fa-fw fa-plus-circle txt-color-green pull-right', 'fa-fw fa-minus-circle txt-color-red pull-right'));
```
On the other hand, setting ```Accordion::options['global_icons']``` will set your panel's to this icons
```
$accordion->options('global_icons', array('fa-lg fa-angle-down pull-right', 'fa-lg fa-angle-up pull-right'));
```

### Accordion::expand
### Accordion::padding
### Accordion::options
An ```array``` - options available for the class
```php
$options = array(
	'global_icons' => array('fa-lg fa-angle-down pull-right', 'fa-lg fa-angle-up pull-right')
);

// sample call
$accordion->options('global_icons', array('fa-lg fa-angle-down pull-right', 'fa-lg fa-angle-up pull-right'));

```