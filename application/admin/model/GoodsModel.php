<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/5/16
 * Time: 11:26
 */

namespace app\admin\model;


use think\Model;

class GoodsModel extends Model
{
    // 确定链接表名
    protected $table = 'snake_goods';

    /*
    * @param $where
    * @param $offset
    * @param $limit
    */
    public function getGoodsByWhere($where,$size)
    {
        return $this->where($where)->order('id desc')->paginate($size);
    }

    //获取全部数据
    public function getAllGoods($where)
    {
        return $this->where($where)->count();
    }
}