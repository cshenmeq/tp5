<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/5/16
 * Time: 11:08
 */

namespace app\admin\controller;
use think\Cache;


use app\admin\model\GoodsModel;

class Goods extends Base
{
    //商品列表
    public function index(){
        $param = input('param.');
        $param['goodsName'] = !empty($param['goodsName']) ? $param['goodsName'] : '';

//        halt($param['goodsName']);
        if (!empty($param['goodsName'])) {
            $where['goods_name'] = ["like","%".$param['goodsName']."%"];
        }
        $size=10;
        $where=[];
        $model=new GoodsModel();
        $goods=$model->getGoodsByWhere($where,$size);
        $total = $model->getAllGoods($where);  // 总数据
        $pager = $goods->appends(['goodsName' => $param['goodsName']])->render();
        $return['rows'] = $goods;
        return $this->fetch('', compact('goods', 'total', 'pager'));
    }

    public function goodsadd()
    {
        Cache::set("name",'PHP no.1');
        Cache::set("age",'29');
        echo Cache::get("name")."<br>";
        echo Cache::get("age");
    }
}