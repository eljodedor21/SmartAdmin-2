SmartUI Widget Class
=========================
This is a basic usage of SmartUI's ```Widget``` class.
Note: This is a basic usage of ```SmartUI```'s ```Widget``` class. If you want to know more about the real HTML layout, click [here](widgets.php)
## Setup
```php
$sui = new SmartUI;
$options = array(
    "colorbutton" => false, 	
	"editbutton" => true, 
	"togglebutton" => true, 
	"deletebutton" => true, 
	"fullscreenbutton" => true, 
	"custombutton" => true, 
	"collapsed" => false, 
	"sortable" => true
);
$widget = $sui->create_widget($options);

```
## Initiate
Below are the list of available properties for the class:
* ```Widget::class``` - add your custom class to the main widget container ``` <div class="jarviswidget" ... > ... </div>```
* ```Widget::id``` - Id of the widget
* ```Widget::attr``` - An ```array``` of your own custom attributes
* ```Widget::options``` - An ```array``` of widget options
* ```Widget::header``` - A ```string```, ```closure``` or ```array([string icon], [{string or array(attr, content, id, class)}] toolbar], [string class], [string id])```  for the widget's header
* ```Widget::body``` - A ```string``` or ```array([string editbox], [string content])``` for body. 
  * Valid keys if passed with ```array```: ```string "editbox"```, string ```string "content"```

## Sample Usage
```php
<?php
	$sui = new SmartUI;
	$options = array(
		"colorbutton" => false, 	
		"editbutton" => false, 
		"togglebutton" => true, 
		"deletebutton" => true, 
		"fullscreenbutton" => true, 
		"custombutton" => true, 
		"collapsed" => false, 
		"sortable" => true
	);
	$widget = $sui->create_widget();
	
	//you can also set options this way
	$widget->options = $options;

	//set a widget property by passing closure
	/*$widget->attr = function($widget) {
		return 'data-custom-attr="test" data-some-id="12345"';
	};*/

	//set a widget property by passing an array
	//$widget->attr = array("data-custom-attr"=>"test", "data-some-id" => "12345");

	//set a widget property by passing string (some properties are required only to have strings)
	$widget->attr = 'data-custom-attr="test" data-some-id="12345"';

	//same as attr example, you can do the same with other widget properties
	//$widget->header = '<h2><strong>Default</strong> <i>Widget</i> PHP</h2>';
	
	//Let's do some dynamic content on the header. Passing toolbar and content keys to $widget->header
	$widget->header = array(
		"icon" => 'fa fa-check',
		"toolbar" => array(
			array(
				"id" => "toolbar-id",
				"content" => '<label class="input"> <i class="icon-append fa fa-question-circle"></i>
							<input type="text" placeholder="Focus to view the tooltip">
							<b class="tooltip tooltip-top-right">
								<i class="fa fa-warning txt-color-teal"></i> 
								Some helpful information</b> 
					</label>',
				"class" => 'smart-form'
			), 
			array(
				"attr" => array("data-cool-id" => "123454321"),
				"content" => '<div class="progress progress-striped active" rel="tooltip" data-original-title="55%" data-placement="bottom">
						<div class="progress-bar progress-bar-success" role="progressbar" style="width: 55%">55 %</div>
					</div>'
			),
			'<div class="label label-danger">
				<i class="fa fa-arrow-up"></i> 2.35% (Simple Toolbar)
			</div>'
		),
		"title" => "<h2>My PHP Widget</h2>"
	);

	$widget->class = "some-cool-class";

	$widget->id = "my-id-here";

	$widget->body = array(
		'editbox'=>'<input class="form-control" type="text">
			<span class="note"><i class="fa fa-check text-success"></i> Change title to update and save instantly!</span>',
		'content' => '<h2>Hello World!</h2><p>I just want to say that word in &lt;h2&gt;</p>');

	$result = $widget->print_html(true);
	echo $result;


?>
```
