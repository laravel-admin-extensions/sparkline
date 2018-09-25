<?php

namespace Encore\Admin\Sparkline;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Column;
use Illuminate\Support\ServiceProvider;

class SparklineServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(Sparkline $extension)
    {
        if (!Sparkline::boot()) {
            return;
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/sparkline')],
                'laravel-admin-sparkline'
            );
        }

        Admin::booting(function () {

            Column::extend('sparkline', SparklineDisplayer::class);

            Admin::js('vendor/laravel-admin-ext/sparkline/jquery.sparkline.min.js');
        });
    }
}