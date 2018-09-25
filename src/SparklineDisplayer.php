<?php

namespace Encore\Admin\Sparkline;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class SparklineDisplayer extends AbstractDisplayer
{
    protected function script()
    {
        $script = <<<SCRIPT

$(".grid-sparkline").each(function () {
  var \$this = $(this);
  \$this.sparkline('html', \$this.data());
});

SCRIPT;

        Admin::script($script);
    }

    public function display($type = null, $options = [])
    {
        $this->script();

        $value = join(',', $this->value);

        $attributes = [];

        $options = array_merge(compact('type'), $options);

        foreach ($options as $key => $option) {
            $attributes[] = "data-$key='$option'";
        }

        $attributes = join(' ', $attributes);

        return <<<HTML
<div class="grid-sparkline" $attributes>{$value}</div>
HTML;

    }
}