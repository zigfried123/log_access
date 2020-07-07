<?php

namespace application\components;

abstract class ApacheParserLog
{
    abstract function parseData($rawData);
}
