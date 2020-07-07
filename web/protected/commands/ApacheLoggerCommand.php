<?php

use \application\models\LogAccess;

class ApacheLoggerCommand extends CConsoleCommand
{
    const LOG_TABLE = 'log_access';

    public function actionLogAccess($args)
    {
        /** @var ApacheLog $component */
        $component = Yii::app()->apache_access_logs;

        $step = 500;

        for ($i = 0; ; $i += $step) {

            echo $i . PHP_EOL;

            $data = $component->getAccessData($i, $step);

            if (empty($data)) {
                break;
            }

            try {
                Yii::app()->db->getCommandBuilder()
                    ->createMultipleInsertCommand(self::LOG_TABLE, $data)
                    ->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
