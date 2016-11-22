<?php

$s1 = 'Romain';
$s2 = &$s1;
$s2 = 'Eric';

var_dump($s1); // Romain

class C
{
    protected $p;

    public function __construct($p)
    {
        $this->p = $p;
    }

    public function getP()
    {
        return $this->p;
    }

    public function setP($p)
    {
        $this->p = $p;
        return $this;
    }
}

$o1 = new C('Romain');
$o2 = $o1;
$o2->setP('Eric');

var_dump($o1->getP()); // Eric
