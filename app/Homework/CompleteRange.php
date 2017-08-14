<?php

namespace App\Homework;

class CompleteRange {

    protected $range;

    public function __construct($range)
    {
        $this->range = $range;
    }

    public function build()
    {
        $return = [];

        for ($i = head($this->range); $i <= end($this->range); $i++) {
            $return[] = $i;
        }

        return $return;
    }
   
}