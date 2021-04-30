<?php
namespace App\Data\怪物\大型;

use App\Data\怪物\Base怪物;

class 青熊兽 extends Base怪物 {
    public $name = '青熊兽';
    public $jp = 'アオアシラ';
    public $en = 'Arzuros'; // 英文名
    public $picture = null; // 图片
    public $category = '牙兽种';
    public $material = '青熊兽'; // 素材名称（前缀）
    public $pronunciation = 'せいゆうじゅう'; // 读法 
    public $laststage = 'MHXX'; // 最终登场
    public $weakness = [['屁股'=>3],['屁股'=>3],['上半身'=>3,'头'=>2],4,2,3,3,1]; // 弱点部位及属性
    public $stageAnomaly = [4,3,4,4,3,4];


    public $body = [
        '头'=>[55,55,55,20,5,10,15,0],
        '上半身'=>[50,50,62,25,5,10,15,0],
        '上肢'=>[33,35,28,30,5,30,20,0],
        '上肢（破坏后）'=>[42,45,36,38,5,38,20,0],
        '腹部、下肢'=>[55,55,38,15,5,10,20,0],
        '屁股'=>[66,66,43,15,5,10,20,0],
    ];


    public $bodyBreak = [
        '头'=>[150,null,'red'],
        '上半身'=>[210,null,'orange'],
        '上肢'=>[150, 150, 'red'],
        '腹部、下肢' => [250, null, 'white'],
        '屁股'=>[170,null,'orange']
    ];
    


    
    // public 



}