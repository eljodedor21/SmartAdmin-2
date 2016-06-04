# SmartUI::print_alert()
Alert box. You can see full HTML documentation [here](general-elements.php)
```php
SmartUI::print_alert($message = '' [, $type = 'info', $options = array(), $return = false])
```

## Usage
```php
SmartUI::print_alert('<strong>Success</strong> The page has been added.', 'success');
```

## $type
```info```, ```success```, ```danger```, ```warning```

## $options
Options available to configure your alert
```php
$options_map = array(
    'closebutton' => true,
    'block' => false,
    'container' => 'div',
    'class' => array(),
    'fade_in' => true,
    'icon' => $type
);
```
### $options[icon]
Icons associated with each type of alert
```php
$icon_map = array(
    'info' => 'fa-info',
    'warning' => 'fa-warning',
    'danger' => 'fa-times',
    'success' => 'fa-check'
);
```