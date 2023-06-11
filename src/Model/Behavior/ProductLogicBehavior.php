<?php
namespace App\Model\Behavior;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use App\Utility\StrConv;

class ProductLogicBehavior extends Behavior{
  protected $_defaultConfig = [];
  /**
   * Agreeアカウント一覧取得
   * @return $list
   */
  public function getList() {
    $query = $this->_table->find('all');
    return $query->toArray();
  }
}
