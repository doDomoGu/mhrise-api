<?php
namespace App\Data\怪物;

class Base怪物 {
    public $name = null;  //中文名
    public $jp = null; // 日文名
    public $en = null; // 英文名

    public $picture = null; // 图片
    public $category = null; // 怪物种类
    public $material = null; // 素材名称（前缀）
    public $pronunciation = null; // 读法 
    public $laststage = null; // 最终登场
    // 部位弱点的有效程度： 3:红色, 2:粉色, 1:绿色  数字越大越有效
    // 属性/状态异常的有效程度:  4:圈+点, 3:圈, 2:三角, 1:叉, 0:无  数字越大越有效  无=无效
    public $weakness = null; // 不同类型武器对部位弱点的有效程度(多个部位)及属性伤害的有效程度:  斩、打、弹、火、水、雷、冰、龙   
    public $stageAnomaly = null; // 状态异常的有效程度  中毒、昏厥、麻痹、睡眠、爆破、裂伤   

    public $roar = null; //咆哮 
    public $wind = null; //风压
    public $shock = null; //震动
    public $attribue = null; //伤害属性
    public $stageAnomal = null; //会造成的状态异常

    public $body = null; //肉质  二维数组  下标一：身体部位  下标二：何种伤害 分别是 斩、打、弹、火、水、雷、冰、龙   
    




    public static function data() {
        return get_class_vars(static::class);
    }

}