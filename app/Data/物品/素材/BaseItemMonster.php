<?php
namespace App\Data\物品\素材;


class BaseItemMonster {


    public static function data() {
        return get_class_vars(static::class);
    }

    public static function consts() {
        $objClass = new \ReflectionClass(static::class);
        return $objClass->getConstants();
    }


}