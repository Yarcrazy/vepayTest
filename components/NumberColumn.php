<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 25.03.2020
 * Time: 17:54
 */

namespace app\components;

class NumberColumn extends \yii\grid\DataColumn
{
  private $_total = 0;

  public function getDataCellValue($model, $key, $index)
  {
    $value = parent::getDataCellValue($model, $key, $index);
    $this->_total += +$value;
    return $value;
  }

  protected function renderFooterCellContent()
  {
    return $this->grid->formatter->format($this->_total, $this->format);
  }
}