<?php

namespace App\Models;

use App\Exceptions\MyException;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Model extends BaseModel {

    // 大多数表的主键都为 ID
    protected $primaryKey = 'id';

    // 不记录时间戳
    public $timestamps = false;

    // 新建数据时允许的字段
    public static $allowColumnsOnCreate = [];

    // 编辑数据时允许的字段
    public static $allowColumnsOnUpdate = [];

    // 字段默认值:   新建数据时用到，自动给不需要赋值的字段增加默认值
    protected $attributes = [];

    // 数据库字段映射关系（别名）, 且 用array_values取到的一维数组为 允许获取的字段
    public static $fieldsMap = [
//        'ID' => 'id'
    ];


    /*
     *  getQuery: 根据fields 和 fieldsMap 构建queryBuilder
     *
     *  @return: queryBuilder
     */
    public static function getQuery() {
        $query = static::query();

        // 添加允许字段 及 别名
        foreach(static::$fieldsMap as $col => $colMap){
            $query->selectRaw('`'.$col.'` as `'.$colMap.'`');
        }

        return $query;
    }

    /*
     * getPaginate: 获得分页项目列表 和 总数
     * params $query: queryBuilder SQL构建对象
     * params $perPage: 每页显示数
     */
    public static function getPaginate(Builder $query, $perPage = null){

        $pagination = $query->paginate($perPage);

        return [$pagination->items() , $pagination->total()];

    }

    /*
     * getInfo: 获得单个数据
     * params $query: queryBuilder SQL构建对象
     * params $id: 主键id
     */
    public static function getInfo(Builder $query, $id){

        return $query->find($id);

    }

    public static function getRules (Request $request, $scenario){}


    public static function validate (Request $request, $scenario){

        $rulesList = static::getRules($request, $scenario);

        if(!isset($rulesList[$scenario])) {
            throw new MyException('wrong scenario of rules');
        }

        $rules = $rulesList[$scenario];

        $messages = [];

        $validator = Validator::make($request->input(), $rules, $messages);

        $errors = [];

        if ($validator->fails()) {

            $errors = $validator->errors()->toArray();

        }

        return $errors;
    }

    public static function getMap() {
        $map    = [];
        $list  = static::query()->get();
        foreach($list as $l){
          $map[$l->id] = $l->toArray();
        }
        
        return $map;
    }

    public static function getMapBySort($column, $direction) {
        $map    = [];
        $list  = static::query()->orderBy($column, $direction)->get();
        foreach($list as $l){
          $map[$l->id] = $l->toArray();
        }
        
        return $map;
    }


    // insert into ads_daily_campaign_report 
    //     (apple_id ,date ,campaign_id ,campaign ,installs ,spent ,updated_at  ) 
    // values 
    //     ( '591888' , '2019-11-11' , '123456' , 'campaign_name_1' , '12' , '34' , '2019-08-11 05:54:03'  ) ,
    //     ( '591888' , '2019-11-11' , '123457' , 'campaign_name_2' , '123' , '344' , '2019-08-11 05:54:03'  ) 
    // on duplicate key update apple_id = 
    //     values (apple_id) ,date = values (date) ,campaign_id = values (campaign_id) ,campaign = values (campaign) ,installs = values (installs) ,spent = values (spent) ,updated_at = values (updated_at) ;


    /**
     * 使用原生sql 进行批量插入或更新
     * $fields:  字段名
     * $dataSet: 数据集 （每段数据顺序和数量要和fields保持一致)
     * $updateFields: 需要更新的字段名 (表示以dataSet中所有其他字段组成唯一键)
     */
    public function insertOrUpdateBatch($fields, $dataSet, $updateFields) {
        if(!empty($dataSet)){
            $fieldsText = ' ('. implode(',',$fields) .') ';

            $fieldsCount = count($fields);
            $valuesArr = [];
            $bindData = [];
            foreach($dataSet as $data) {
                $binds = [];
                for($n=0; $n < $fieldsCount; $n++){
                    $binds[] = '?';
                }
                $valuesArr[] = '('. implode(',',$binds) .')';

                foreach($data as $d){
                    $bindData[] = $d;
                }
            }
            $valuesText = implode(',', $valuesArr);

            $updateArr = [];
            foreach($updateFields as $f) {
                $updateArr[] = $f .' = values('. $f .')';
            }
            $updateText = implode(',', $updateArr);

            $sql = 'insert into '. $this->table .
                $fieldsText .
                ' values '. $valuesText .
                ' on duplicate key update '.$updateText;
            
            return DB::connection($this->connection)->update(DB::raw($sql), $bindData);
        } else {
            return false;
        }
    }

}