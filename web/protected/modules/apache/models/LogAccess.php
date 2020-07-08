<?php

namespace application\modules\apache\models;

use CActiveRecord;
use DateTime;
use CActiveDataProvider;
use CDbCriteria;
use Yii;


/**
 * This is the model class for table "log_access".
 *
 * The followings are the available columns in table 'log_access':
 * @property integer $id
 * @property string $ip
 * @property integer $date
 * @property string $data
 */
class LogAccess extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'log_access';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ip, date, data', 'required'),
            array('date', 'numerical', 'integerOnly' => true),
            array('ip', 'length', 'max' => 20),
            array('data', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, ip, date, data', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'ip' => 'Ip',
            'date' => 'Date',
            'data' => 'Data',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('date', $this->date);
        $criteria->compare('data', $this->data, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LogAccess the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getDataByIp(string $ip)
    {
        $criteria = new CDbCriteria();

        $criteria->condition = 'ip=:ip';
        $criteria->params = array(':ip' => $ip);

        return $criteria;

    }

    public function getDataByDate(string $date)
    {
        $date = (new DateTime($date))->getTimestamp();

        $from = $date;
        $to = $date + 86400;

        $criteria = new CDbCriteria();

        $criteria->condition = 'date BETWEEN :from AND :to';
        $criteria->params = array(':from' => $from, ':to' => $to);

        return $criteria;

    }

    public function getDataByPeriod(string $from, string $to)
    {
        $from = (new DateTime($from))->getTimestamp();
        $to = (new DateTime($to))->getTimestamp();

        $to += 86400;

        $criteria = new CDbCriteria();

        $criteria->condition = 'date BETWEEN :from AND :to';
        $criteria->params = array(':from' => $from, ':to' => $to);

        return $criteria;
    }

    public static function clearTable()
    {
        $q = Yii::app()->db->createCommand('TRUNCATE TABLE log_access');
        $q->execute();
    }
}
