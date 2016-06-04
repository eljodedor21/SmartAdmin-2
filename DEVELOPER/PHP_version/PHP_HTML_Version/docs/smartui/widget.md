# SmartUI::Widget Class
This is a basic usage of SmartUI's ```Widget``` class. If you want to know more about the real HTML layout, click [here](widgets.php)
```php
SmartUI::Widget([$options = array(), $user_contents = array('body' = '', 'header' = '', 'color' = '')]);
```

## Setup
```php
$ui = new SmartUI;
$options = array("editbutton" => false);
$widget = $ui->create_widget($options);
```
## Usage

```php
// using standard
$widget->body = array(
	"editbox" => 'my edit box content',
	"content" => 'This is the content of my body.'
);
$widget->header = array(
	"title" => '<h2>The Title</h2>',
	"icon" => 'fa fa-check'
)

// using jQuery style
$widget->body("content", 'This is the content of my body.', function($widget) {
	// process callback here ...
	$widget->body("editbox", 'my edit box content');
})->header("title", '<h2>The Title</h2>')->header("icon", 'fa fa-check'); // chaining
```

## Print!
```php
$widget->print_html();
```

## Property Reference
Below are the list of available properties for the class:

### Widget::class
A ```string``` or ```closure``` that will add your custom class to the main widget container ```<div class="jarviswidget" ... > ... </div>```

### Widget::color
A ```string``` or ```closure``` that will add the color class to the main widget container ```<div class="jarviswidget jarviswidget-color-YOURCOLOR" ... > ... </div>```. See other documentations to get the list of available SmartAdmin colors.

### Widget::id
A ```string``` or ```closure```

### Widget::attr
A ```string```, ```closure``` or ```array``` of your own custom attributes

### Widget::options
An ```array``` of widget options. See available optionss in the [HTML Documentation](widgets.php)

```php
$options = array(
	"editbutton" => true,
	"colorbutton" => true, 	
	"editbutton" => true, 
	"togglebutton" => true, 
	"deletebutton" => true, 
	"fullscreenbutton" => true, 
	"custombutton" => true, 
	"collapsed" => false, 
	"sortable" => true,
	"refreshbutton" => false
);
```

### Widget::header
A ```string```, ```closure``` or ```array``` for the widget's header
	
```php
$header = array(
	"icon" => "", 
	"class" => "", 
	"id" => "",
	"title" => "",
	"toolbar" => array( // can also be a string or closure
		array(
			"id" => "",
			"content" => "",
			"class" => "",
			"attr" => "" // can be array('data-my-attribute'=>'some-1234', 'data-id'=>'1235')
		),
		// ... so on
	)
);
```
	
### Widget::body
A ```string```, ```closure``` or ```array``` for body. 

``` php
$body = array( // can be string or closure
	"editbox" => "",
	"content" => "",
	"class" => "", // can also be an array
	"toolbar" => ""
)
```

## Tips!
You can pass a ```closure``` and return an ```array``` (same way as passing the ```array``` directly)
```php
$widget->body = function($w) {
	// some logic here ...
	return array(
		"editbox" => "editbox content ....",
		"content" => "<h2>Body Content here ...</h2>"
	);
};
```