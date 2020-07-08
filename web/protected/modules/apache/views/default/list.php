<?php
/* @var $this DefaultController */
/* @var $data CActiveDataProvider */

$this->breadcrumbs=array(
    $this->module->id => $this->createUrl('/apache'),
    $this->action->id
);

?>
    <h2 align="center">Таблица логов access</h2>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$data,
));
