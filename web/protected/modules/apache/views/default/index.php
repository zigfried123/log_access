<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<p>
    <a href="<?= $this->createUrl('/apache/getDataByIp', ['ip' => '127.0.0.1']); ?>">
        GetDataByIp
    </a>
</p>
<p>
    <a href="<?= $this->createUrl('/apache/getDataByDate', ['date' => '08-07-2020']); ?>">
        GetDataByDate
    </a>
</p>
<p>
    <a href="<?= $this->createUrl('/apache/getDataByPeriod', ['from' => '08-07-2020', 'to' => '08-07-2020']); ?>">
        GetDataByPeriod
    </a>
</p>

<p>
    <a href="<?= $this->createUrl('/apache/getDataByIpJson', ['ip' => '127.0.0.1']); ?>">
        GetDataByIpJson
    </a>
</p>
<p>
    <a href="<?= $this->createUrl('/apache/getDataByDateJson', ['date' => '08-07-2020']); ?>">
        GetDataByDateJson
    </a>
</p>
<p>
    <a href="<?= $this->createUrl('/apache/getDataByPeriodJson', ['from' => '08-07-2020', 'to' => '08-07-2020']); ?>">
        GetDataByPeriodJson
    </a>
</p>
