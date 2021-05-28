<?php
namespace App\Data\怪物;

use App\Data\Consts\部位;

class 蛮颚龙 extends Base怪物 {

    public $name = '蛮颚龙';
    public $jp = 'アオアシラ';
    public $en = 'Anjanath'; // 英文名
    public $image = '怪物/蛮颚龙.jpg'; // 图片
    public $category = '兽龙种';

    public $material = '蛮颚龙'; // 素材名称（前缀）
    public $pronunciation = 'ばんがくりゅう'; // 读法 
    public $laststage = 'MHWI'; // 最终登场
    public $weakness = [[部位::鼻=>3, 部位::头=>2],[部位::鼻=>3,部位::头=>2],[部位::鼻=>3,部位::头=>2],1,4,2,3,2]; // 弱点部位及属性
    public $stageAnomaly = [2,2,2,2,2,2,2]; // 状态异常

    public $roar = 'big'; //咆哮 
    public $wind = 'small'; //风压
    public $quake = null; //震动
    public $elementDamage = 'fire'; // 会造成的元素伤害
    public $stageDamage = null; // 会造成的状态异常


    public $body = [
        部位::头 =>[70,70,60,0,25,10,15,5],
        部位::鼻 =>[80,75,65,0,20,10,15,10],
        部位::脖子=>[30,30,15,0,20,5,15,5],
        部位::翅膀=>[50,45,55,0,25,15,20,10],
        部位::躯干=>[30,30,45,0,15,5,10,0],
        部位::脚=>[30,30,15,0,15,5,10,0],
        部位::脚.'(破坏后)'=>[45,45,30,0,15,5,10,0],
        部位::尾巴=>[60,60,55,0,20,10,15,5]
        
    ];


    public $bodyBreak = [
        部位::头     =>  [240,480,'red'],
        部位::躯干   =>  [300,null,'orange'],
        部位::左翅膀  =>  [220,null,'orange'],
        部位::右翅膀  =>  [220,null,'orange'],
        部位::左脚  => [100, 100, 'white'],
        部位::右脚 => [100, 100, 'white'],
        部位::尾巴  =>  [200,350,'orange']
    ];
    


    
    // public 



}