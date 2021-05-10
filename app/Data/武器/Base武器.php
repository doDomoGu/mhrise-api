<?php
namespace App\Data\武器;

class Base武器 {
    public $title = null;  //中文名称

    public static function data() {
        return get_class_vars(static::class);
    }

}