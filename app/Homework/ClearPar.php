<?php

namespace App\Homework;

class ClearPar {

    protected $sentence;
    private $char;

    public function __construct($sentence)
    {
        $this->sentence = $sentence;
        $this->char = '()';
    }

    public function build()
    {
        $return = '';

        foreach (explode($this->char, $this->sentence) as $key => $item) {
            if ($key > 0)
                $return .= $this->char;
        }

        return $return;
    }
   
}