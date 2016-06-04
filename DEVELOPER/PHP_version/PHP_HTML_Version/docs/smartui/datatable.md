# SmartUI::DataTable Class
This is a basic usage of SmartUI's ```DataTable``` class. If you want to know more about the real HTML layout, click [here](datatable.php)
```php
SmartUI::DataTable($data [, $options = array(), $title = '<h2>DataTable Result Set</h2>']);
```

## Setup
```php
$data = json_decode(file_get_contents(APP_URL."/data/data.json"));

$ui = new SmartUI;
$options = array(
	'checkboxes' => true,
	'row_details' => '
		<div class="alert alert-warning fade in">
			<i class="fa-fw fa fa-warning"></i>
			<strong>Warning</strong> The ID for {{Name}} is #{{ID}}.
		</div>'
);

$dt = $ui->create_datatable($data, $options, '<h2>My Datatable</h2>');
);
```

## Usage
```php
// setup a cell
$dt->cell('Name', 
	array(
		'url' => 'http://myapp.com/?profile={{ID}}' // you get other's cell value using "{{COLUMN_NAME}}"
	)
);

$dt->cell('Name', function($row, $value) {
	return 'http://myapp.com/?profile='.$row->ID // or use a callback to return "Name" column's custom content
});

// hide a column
$dt->hide('City', true);
// or ...
$dt->hidden(array('City'));
```

## Print HTML!
```php
$dt->print_html();
```

## Print JS!
```php
<script>
	<?php
		$dt->print_js();
	?>
</script>
```

## Property Reference
Below are the list of available properties for the class:

### DataTable::cell
```array``` of specified column name with ```string```, ```closure``` or ```array``` value
```php
$cell = array(
	'COLUMN_NAME' => array(
		'icon' => '',
		'content' => '',
		'color' => '',
		'url' => array( // can also be a direct string URL
			'href' => '',
			'target' => '',
			'title' => '',
			'attr' => ''
		)
	)
);

// sample call
$dt->cell(
	"Phone" => '{{Name}} - {{Phone}} <span class="label label-success">active</span>'
);
// or..
$dt->cell('Phone', function($row, $value) {
	return $row->Name.' - '.$value.' <span class="label label-success">active</span>';
});
```

### DataTable::col
```array``` of specified column name with ```string```, ```closure``` or ```array``` value
```php
$col = array(
	'COLUMN_NAME' => array( // can also be a closure, but you need to return same array structure. If string, it's default to the 'name' key
		'name' => '',
		'class' => '',
		'attr' => '',
		'icon' => '',
		'hidden' => false // or true
	)
);

// sample call
$dt->col('ID', array(
	'name' => 'ID #'
));

// or...
$dt->col('ID', 'ID #');
```

### DataTable::options
```array``` of options.
```php
$options = array(
	"in_widget" => true,
	"row_details" => false,
	"checkboxes" => false,
	"static" => false,
	"paginate" => true
);

// sample call
$dt->options('in_widget', true)->options('checkboxes', true);
```

### DataTable::data
```array``` of ```object``` or ```array```. This is the main datasource. It's recomended to set this up upon ```$ui->create_datatable($data);```

### DataTable::widget
```SmartUI::Widget``` the main widget container of the table (if ```$options['in_widget'] == true```). Check out ```Widget``` Class documentation [here](widgets-class.php)

### DataTable::id
```string``` of table's id (will create a unique id if not specified)

### DataTable::row
```array``` array of specified row ```index``` with ```array```, ```closure``` or ```string``` values.
```php
$row = array(2, array(
	"hidden" => false,
	"checkbox" => true,
	"detail" => true,
	"class" => "",
	"attr" => "",
	"content" => true
));

// sample call
$dt->row(2, array(
	'checkbox' => false,
	'deail' => true
))
// empty a row
$dt->row(3, '');
//hide a row
$dt->row(4, false);
```

### DataTable::hidden
```array``` of hidden columns
```php
// sample call
$dt->hidden(array('Name', 'Zip'));
```

### DataTable::hide
```array``` of column names with ```bool``` values
```php
// sample call
$dt->hide('Name', true)->hide('Zip', true)->hide('City', false);
```

### DataTable::js
```array``` of js custom properties
```php
$js = array(
	'properties' => array(),
	'oTable' => '', // the oTable var
	'custom' => ''
)

// sample call
$dt->js('properties', array(
	'fnCreatedRow' => 'function( nRow, aData, iDataIndex ) {
        var cell = $("td:eq(7)", nRow);
        var city = aData[7];
        if ( city == "Abbotsford" || city == "Baranello" ) {
            cell.html(city + \' <span class="label label-info">great city</span>\');
        }
    }'
));
```

### DataTable::sort
```array``` of specified coumn name to be sorted
```php
$sort = array('COLUMN_NAME', 'asc');

// sample call
$dt->sort('Name', 'asc');
```