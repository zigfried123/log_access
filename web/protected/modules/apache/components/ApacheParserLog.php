<?php

namespace application\modules\apache\components;

abstract class ApacheParserLog
{
    abstract function parseData($rawData);
}
