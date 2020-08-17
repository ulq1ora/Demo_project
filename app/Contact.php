<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonInterval;

class Contact extends Model
{
    public function getTtlSeconds():  ?int
    {
        $map = [
            '10m' => CarbonInterval::minutes(10)->totalSeconds,
            '01h' => CarbonInterval::hour(1)->totalSeconds,
            '03h' => CarbonInterval::hour(3)->totalSeconds,
            '01d' => CarbonInterval::day(1)->totalSeconds,
            '01w' => CarbonInterval::week(1)->totalSeconds,
            '01m' => CarbonInterval::month(1)->totalSeconds,
            'inf' => null
        ];

        return $map[$this->ttl];
    }

    public function isExpired():bool
    {
        $now=Carbon::now()->seconds()->timestamp;
        $created_at=strtotime($this->created_at);
        $ttl_seconds=$this->getTtlSeconds();
        if (null == $ttl_seconds){
            return false;
        }
        $expired_at = $created_at+$ttl_seconds;
        //dd($now, $ttl_seconds, $created_at, $expired_at, $now-$expired_at);
        if ($expired_at < $now) {
            return true;
        } else {
            return false;
        }
    }
}

