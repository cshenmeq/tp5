<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/5/16
 * Time: 11:08
 */

namespace app\admin\controller;


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
        echo 666;
        echo 666;
    }
}