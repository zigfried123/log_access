<?php

namespace application\components;

use \DateTime;

class ApacheParserAccessLog extends ApacheParserLog
{
    public function parseData($rawData)
    {
        $data = [];

        foreach ($rawData as $key => $string) {

            if (!preg_match('/^\d+\.\d+\.\d+\.\d+/', $string, $ip)) {
                continue;
            }

            if (preg_match('/\d+\/\w+\/\d+:\d+:\d+:\d+/', $string, $date)) {
                $date = DateTime::createFromFormat('j/M/Y:H:i:s', $date[0]);
            }

            $data[] = ['ip' => $ip[0], 'date' => $date->getTimestamp(), 'data' => $string];

        }

        return $data;
    }
}
