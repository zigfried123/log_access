<?php

use application\modules\apache\components\ApacheParserAccessLog;

class ApacheLog extends \CApplicationComponent
{
    public $path;
    public $parser;

    public function getAccessData($offset, $batch)
    {
        $rawData = file($this->path, FILE_IGNORE_NEW_LINES);

        $rawData = array_splice($rawData, $offset, $batch);

        $parser = new ApacheParserAccessLog;

        $parsedData = $parser->parseData($rawData);

        return $parsedData;
    }

}
