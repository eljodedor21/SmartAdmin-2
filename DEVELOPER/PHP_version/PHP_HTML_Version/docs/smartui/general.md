# SmartUI
General elements that you can directly access by using some methods of SmartUI

## Alerts
```SmartUI::print_alert($message = '' [, $type = 'info', $options = array(), $return = false])```

### Usage
```php
SmartUI::print_alert('<strong>Success</strong> The page has been added.', 'success');
```

### Type
```info```, ```success```, ```danger```, ```warning```

### Options
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
#### Icon
Icons associated with each type of alert
```php
$icon_map = array(
    'info' => 'fa-info',
    'warning' => 'fa-warning',
    'danger' => 'fa-times',
    'success' => 'fa-check'
);
```