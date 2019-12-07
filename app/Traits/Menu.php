<?php

namespace App\Traits;

use App\Category;

trait Menu
{
    public function __construct()
    {
        $categories = Category::whereNull('category')->get();
        $categories_son = Category::orderBy('category')->orderBy('name')->get();
        session()->forget('menu.padres');
        session()->forget('menu2.hijos');

        foreach( $categories as $c) {
            session()->push('menu.padres', $c);
        }

        foreach( $categories_son as $cs) {
            session()->push('menu2.hijos', $cs);
        }

        
        
        // dd(session()->get('padres'));
    }
}