Use jQuery Sparkline in laravel-admin
======

## Screenshots

![qq20180926-010814](https://user-images.githubusercontent.com/1479100/46030513-edf66280-c128-11e8-9589-13adb73f432a.png)

![qq20180926-010742](https://user-images.githubusercontent.com/1479100/46030524-f9498e00-c128-11e8-8acb-4e85a0f58ba7.png)

## Installation

```bash
composer require laravel-admin-ext/sparkline

php artisan vendor:publish --tag=laravel-admin-sparkline
```

## Configuration

Open `config/admin.php`, add configurations that belong to this extension at `extensions` section.

```php

    'extensions' => [

        'sparkline' => [
        
            // Set to `false` if you want to disable this extension
            'enable' => true,
        ]
    ]

```

## Usage

### Use as chart panel 

Create a view in views directory like `resources/views/admin/sparkline/bar.blade.php`, and add following codes:

```html
<div class="row text-center">
    <div id="sparkline-bar"></div>
</div>
<script>
    $(function () {
        $("#sparkline-bar").sparkline([6,4,8, 9, 10, 5, 13, 18, 21, 7, 9], {
            type: 'bar',
            width: '100%',
            height: 150,
            barSpacing: 3,
            barWidth: 20,
            barColor: "#f39c12"
        });
    });
</script>
```

Then show it on the page

```php
class SparklineController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('jQuery sparkline')
            ->body(new Box('Bar chart', view('admin.sparkline.bar')));
    }
}
```

For more usage, please refer to the official [Documentation](https://omnipotent.net/jquery.sparkline) of jQuery sparkline.

### Use in grid column

If column `scores` returns a value with array type, and you wants to display this column as a inline line graphs

```php
$grid->scores()->sparkline('line');

// add options
$grid->scores()->sparkline('line', [
    'width' => 100,
    'spotRadius' => 2
]);
```
There are also 6 other chart types such as `bar`, `pie`,`box`,`tristate`,`bullet`,`discrete`,  and all options can be found in official [Documentation](https://omnipotent.net/jquery.sparkline) of jQuery sparkline.

## Donate

> Help keeping the project development going, by donating a little. Thanks in advance.

[![PayPal Me](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/zousong)

![-1](https://cloud.githubusercontent.com/assets/1479100/23287423/45c68202-fa78-11e6-8125-3e365101a313.jpg)

License
------------
Licensed under [The MIT License (MIT)](LICENSE).