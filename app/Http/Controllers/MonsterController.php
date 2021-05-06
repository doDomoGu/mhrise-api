<?php

namespace App\Http\Controllers;

use App\Data\怪物\青熊兽;
use App\Data\怪物\伞鸟;

use App\Data\物品\素材\青熊兽 as 青熊兽素材;

class MonsterController extends Controller
{
    public function index() {
        $this->写入怪物();
    }

    public function test() {
        echo "<pre>";
        print_r(青熊兽素材::consts());
        echo "<hr/>";
        print_r(青熊兽素材::data());
        echo "<hr/>";
        print_r(青熊兽::data());
        // var_dump(item青熊兽::青熊兽の毛);
        exit;
    }

    private function 写入怪物(){
        // $testList = ['青熊兽'];
        $classPath = 'App\\Data\\怪物\\';
        $files = scandir(app_path('Data/怪物'));

        $writeFileName = 'monster.json'; 

        $content = [];
        foreach($files as $f) {
            if($f === '.' || $f === '..' || $f === 'Base怪物.php') continue;

            $className = pathinfo($f)['filename'];

            if(isset($testList) && !in_array($className, $testList)) continue;

            $class = $classPath.$className;
            
            $content[] = $class::data();
        }

        $this->w($writeFileName, json_encode($content));


        // $list = 
        
        // 青熊兽::data();
    }

    public function list() {

        // var_dump(get_object_vars(new 青熊兽));exit;

        var_dump(青熊兽::data());
        echo "<br/>";
        var_dump(伞鸟::data());
        
        exit;

        // $id = Request::get('id');

        $list = [ [ 'id'=>1, 'name' => 'qingxiongshou'], ['id'=>2,'name' => 'tiaogoulong'], ['id'=>3,'name'=>'lianyoulongwang']];

        $fileName = 'monster.json';
        $txt = json_encode($list);

        $this->w($fileName , $txt);

        $data = $list;
        return response()->json($data);
    }
}
