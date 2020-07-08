<?php

use application\modules\apache\models\LogAccess;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionGetDataByIp(string $ip)
    {
        if (!preg_match('/^\d+\.\d+\.\d+\.\d+$/', $ip)) {
            throw new Exception('Wrong IP format');
        }

        $criteria = (new LogAccess)->getDataByIp($ip);

        $data = new CActiveDataProvider(LogAccess::class, array(
            'criteria' => $criteria,
        ));

        $this->render('list', compact('data'));
    }

    public function actionGetDataByDate(string $date)
    {
        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $date)) {
            throw new Exception('Wrong Date format');
        }

        $criteria = (new LogAccess)->getDataByDate($date);

        $data = new CActiveDataProvider(LogAccess::class, array(
            'criteria' => $criteria,
        ));

        $this->render('list', compact('data'));

    }

    public function actionGetDataByPeriod(string $from, string $to)
    {
        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $from) || !preg_match('/^\d{2}-\d{2}-\d{4}$/', $to)) {
            throw new Exception('Wrong Date format');
        }

        $criteria = (new LogAccess)->getDataByPeriod($from, $to);

        $data = new CActiveDataProvider(LogAccess::class, array(
            'criteria' => $criteria,
        ));

        $this->render('list', compact('data'));
    }

    public function actionGetDataByIpJson(string $ip)
    {
        if (!preg_match('/^\d+\.\d+\.\d+\.\d+$/', $ip)) {
            throw new Exception('Wrong IP format');
        }

        $criteria = (new LogAccess)->getDataByIp($ip);

        $data = LogAccess::model()->findAll($criteria);

        echo CJSON::encode($data);
    }

    public function actionGetDataByDateJson(string $date)
    {
        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $date)) {
            throw new Exception('Wrong Date format');
        }

        $criteria = (new LogAccess)->getDataByDate($date);

        $data = LogAccess::model()->findAll($criteria);

        echo CJSON::encode($data);
    }

    public function actionGetDataByPeriodJson(string $from, string $to)
    {
        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $from) || !preg_match('/^\d{2}-\d{2}-\d{4}$/', $to)) {
            throw new Exception('Wrong Date format');
        }

        $criteria = (new LogAccess)->getDataByPeriod($from, $to);

        $data = LogAccess::model()->findAll($criteria);

        echo CJSON::encode($data);
    }
}
