<?php

namespace App\Providers;

use App\Rules\OrderItemsRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Register your custom validation rule here
         Validator::extend('order_items_rule', function ($attribute, $value, $parameters, $validator) {
            // Here you can call your custom validation logic from the OrderItemsRule class
            $orderItemsRule = new OrderItemsRule();
            return $orderItemsRule->passes($attribute, $value);
        });

        // Other code in the boot method...
    }
}
