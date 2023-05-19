<?php
namespace application\controller;

use application\util\UrlUtil;

class ShopController extends Controller{
    public function mainGet(){
        
        return "main"._EXTENSTION_PHP;
    }

    // public function item(){
    //     $result = $this->model->getItem();
    //     $this->model->close(); //DB 파기

    //     return $result;
    // }
}
?>