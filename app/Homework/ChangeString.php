<?php

namespace App\Homework;

class ChangeString {

    protected $sentence;
    private $abc;

    public function __construct($sentence)
    {
        $this->sentence = $sentence;
        $this->abc = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    public function build()
    {
        $return = '';

        foreach (str_split($this->sentence) as $char) {
            if (($pos = strpos($this->abc, $char)) > -1) {
                if (strlen($this->abc) == $pos + 1)
                    $pos = ctype_upper($char) ? 25 : -1;
                $return .= substr($this->abc, $pos + 1, 1);
            }
            else
                $return .= $char;
        }
        return $return;
    }
   
}