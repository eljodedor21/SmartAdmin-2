# SmartUI::SmartForm Class
This is a basic usage of SmartUI's ```SmartForm``` class. This class will help you build FORMS easyly without writing too many HML codes. If you want to know more about the real HTML layout, click [here](form-elements.php)

```php
SmartUI::SmartForm($fields [, $options = array()]);
```

## $fields
The ```$fields``` is an ```array``` parameter will tell the SmartForm what fields to be added. 
```php
$fields = array(
	'fname' => array(
		'type' => 'input', // or FormField::FORM_FIELD_INPUT
		'col' => 6,
		'properties' => array(
			'placeholder' => 'First name',
			'icon' => 'fa-user',
			'icon_append' => false
		)
	),
	'lname' => array(
		'type' => 'input',
		'col' => 6,
		'properties' => array(
			'placeholder' => 'Last name',
			'icon' => 'fa-user',
			'icon_append' => false
		)
	),
	// so on ...
);
```
The ```key``` of eacy item is the Field's ```name``` attribute. It is also used when referring to a field you want to customize. Each ```item``` may contain an ```array``` or ```closure``` (must return the same array format). See below:
```php
$field = array(
	'fname' => (
		'type' => SmartForm::FORM_FIELD_INPUT, // the type of field. 
		'col' => 0, // grid column
		'properties' => array() // properties of the field type
	)
)
```

### Field Types
Below are the fields types used by ```SmartUI::SmartForm``` and it's properties

#### SmartForm::FORM_FIELD_INPUT
```php
$default_prop = array(
	'type' => 'text',
	'attr' => array(),
	'id' => '',
	'icon' => '',
	'icon_append' => true,
	'placeholder' => '',
	'value' => '',
	'tooltip' => array(),
	'disabled' => false,
	'autocomplete' => false,
	'size' => '',
	'class' => array()
);
```
#### SmartForm::FORM_FIELD_LABEL
```php
$default_prop = array(
	'label' => ''
);
```
#### SmartForm::FORM_FIELD_RATINGS
```php
$default_prop = array(
	'items' => array(),
	'icon' => 'fa-star'
);
```
#### SmartForm::FORM_FIELD_RATING
```php
$default_prop = array(
	'max' => 5,
	'icon' => 'fa-star'
);
```
#### SmartForm::FORM_FIELD_TEXTAREA
```php
$default_prop = array(
	'rows' => 3,
	'attr' => array(),
	'class' => array(),
	'value' => '',
	'id' => '',
	'type' => '',
	'placeholder' => ''
);
```
#### SmartForm::FORM_FIELD_MULTISELECT
```php
$default_prop = array(
	'data' 	=> array(),
	'display' => '',
	'value' => '',
	'container' => 'select',
	'id' => '',
	'attr' => array(),
	'class' => array(),
	'icon' => '<i></i>',
	'disabled' => false
);
```
#### SmartForm::FORM_FIELD_SELECT
```php
$default_prop = array(
	'data' 	=> array(),
	'display' => '',
	'value' => '',
	'container' => 'select',
	'id' => '',
	'attr' => array(),
	'class' => array(),
	'icon' => '<i></i>',
	'disabled' => false
);
```
#### SmartForm::FORM_FIELD_FILEINPUT
This is handled by the class automatically

#### SmartForm::FORM_FIELD_INPUT
```php
$default_prop = array(
	'type' => 'text',
	'attr' => array(),
	'id' => '',
	'icon' => '',
	'icon_append' => true,
	'placeholder' => '',
	'value' => '',
	'tooltip' => array(),
	'disabled' => false,
	'autocomplete' => false,
	'size' => '',
	'class' => array()
);
```
#### SmartForm::FORM_FIELD_RADIO
```php
$default_prop = array(
	'items' => array(
		array(
			'name' => $name,
			'checked' => false,
			'value' => '',
			'label' => '',
			'id' => '',
			'disabled' => false
		),
		'Can Be a String Also', // a string value will directly be the item's label
		// next item and so on ...
	),
	'cols' => 0,
	'inline' => false,
	'toggle' => false
);
```

#### SmartForm::FORM_FIELD_CHECKBOX
Same properties as ```SmartForm::FORM_FIELD_RADIO```

---

## Setup
```php
$fields = array(
	'fname' => array(
		'type' => 'input', // or FormField::FORM_FIELD_INPUT
		'col' => 6,
		'properties' => array(
			'placeholder' => 'First name',
			'icon' => 'fa-user',
			'icon_append' => false
		)
	),
	'lname' => array(
		'type' => 'input',
		'col' => 6,
		'properties' => array(
			'placeholder' => 'Last name',
			'icon' => 'fa-user',
			'icon_append' => false
		)
	),
	// so on ...
);
$form = $ui->create_smartform($fields);
```

## Usage
```php
$form->fieldset(0, array('fname'));
$form->fieldset(1, array('lname'));
```

## Print it!
```php
$form->print_html();
```

## Property Reference
Below are the list of available properties for the class:

### SmartForm::options
An ```array``` of available options
```php
$options = array(
	'in_widget' => true // default
);

// sample call
$form->options('in_widget', false); // remove the output form from the widget
```

### SmartForm::field
An ```array``` - list of ```fields``` (provided upon creation of ```SmartUI::SmartForm```)
```php
$form->field('fname', array(
	'type' => 'input', // or FormField::FORM_FIELD_INPUT
	'col' => 6,
	'properties' => array(
		'placeholder' => 'First name',
		'icon' => 'fa-user',
		'icon_append' => false
	)
));
```

### SmartForm::fieldset
An ```array``` - list of ```fields``` with their corresponding ```<fieldset>``` location (```o``` indexed). 
```php
$form->fieldset(0, array('fname')); // we set ```fname``` field to the first ```fieldset```
$form->fieldset(1, array('lname', 'address')); // and ```address``` field to the second ```fieldset```
```
### SmartForm::type
An ```array``` - list of ```fields``` with their corresponding field ```type```
```php
$form->type('fname', SmartForm::FORM_FIELD_INPUT);
$form->type('checboxes', 'radio'); // change the ```type``` of field ```checkboxes``` to type ```SmartForm::FORM_FIELD_RADIO```
```

### SmartForm::property
An ```array``` - list of ```fields``` with their corresponding ```properties``` property
```php
$form->property('fname', array('col' => 3)); // change the ```properties[col]``` value of field ```fname``` 
```
### SmartForm::header
A ```string``` - The form's header ```HTML``` content
```php
$form->header('My Form Below!!!');
```
### SmartForm::footer
A ```string``` - The form's footer ```HTML``` content
```php
$form->footer(function($this) use ($ui) {
	return $ui->create_button('Submit', 'primary')->attr(array('type' => 'submit'))->print_html(true);
});

// or ...
$btn = $ui->create_button('Submit', 'primary')->attr(array('type' => 'submit'))->print_html(true);
$form->footer($btn->print_html(true));
```
### SmartForm::widget
A ```SmartUI::Widget``` instance - the instance class of ```SmartUI::Widget```. Note that you need to set ```SmartUI::SmartForm::options['in_widget']``` to ```true```
```php
$widget = $form->widget;
// configure your widget
$widget->header('title', 'My Form Widget Title');
```

### SmartForm::title
A ```string``` - Title of the ```SmartForm::widget``` instance.
```php
$form->title('My New Title');
// same thing when getting $form->widget and setting it's $form->widget->header('title', 'My New Title');
```

### SmartForm::col
An ```array``` - List of ```fields``` with their corresponding ```col``` property
```php
$form->col('lname', 6); // set the col property of field lname to 6
```

