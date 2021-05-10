<?php
namespace App\Data\地图;

class Base地图 {
    public $title = null;  //中文名称

    public static function data() {
        return get_class_vars(static::class);
    }

}