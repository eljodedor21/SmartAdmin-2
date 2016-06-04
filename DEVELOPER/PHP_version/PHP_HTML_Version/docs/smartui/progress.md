# SmartUI::print_progress
Print a single Progress Bar. You can see full HTML documentation [here](general-elements.php)
```php
SmartUI::print_progress($value [, $type = '', $options = array(), $return = false]);
```

## Usage
```php
SmartUI::print_progress(55, 'success');
```

## $type
```info```, ```success```, ```danger```, ```warning```

## $options
Options available to configure your progress bar
```php
$options_map = array(
    'transitional' => false,
    'class' => array(),
    'attr' => array(),
    'background' => '',
    'tooltip' => array(),
    'position' => 'left', // left, right, bottom (for vertical)
    'wide' => false,
    'size' => 'md', // sm, xs, md, xl, micro
    'striped' => false, // true or 'active'
    'vertical' => false
);
```

### $options[background]
```redLight```, ```greenLight```, etc. Check out ```bg-color-*``` [here](typography.php)

### $options[striped]
A ```boolean``` or the ```string``` "active" (will set to active stripped progress bar)
```
$options = array('striped' => 'active');
```

***

# SmartUI::print_stack_progress
Print a stacked Progress Bar. You can see full HTML documentation [here](general-elements.php)
```php
SmartUI::print_stack_progress($progress_bars [, $base_options = array(), $return = false])
```

## Usage
```php
$progress_bars = array();
$progress_bars[] = SmartUI::get_progress(80, '', array('background' => 'redLight'));
$progress_bars[] = SmartUI::get_progress(55, 'info');
$progress_bars[] = SmartUI::get_progress(33, 'success');
SmartUI::print_stack_progress($progress_bars, array('size' => 'sm', 'tooltip' => 'Stacked Progress'), true);
```

## $progress_bars
An ```array``` of progress bar HTML. You can get a progress bar HTML suing ```SmartUI::get_progress($value [, $type = '', $options = array()])``` function
```
// initiate an array for progress bars
$progress_bars = array(); 

// get progress bar #1
$progress_bar = SmartUI::get_progress(80, '', array('background' => 'redLight'));
// and so on ...
```

## $base_options
Available options for the progress bar parent
```php
$options_map = array(
    'tooltip' => array(),
    'position' => 'left', // left, right, bottom (for vertical)
    'wide' => false,
    'size' => 'md', // sm, xs, md, xl, micro
    'striped' => false, // true or 'active'
    'vertical' => false
);
```

