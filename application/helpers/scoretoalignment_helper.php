<?php

class Point {
 
    public $x;
    public $y;
    public $id;
 
    function __construct($x, $y, $id) {
        $this->x = $x;
        $this->y = $y;
        $this->id = $id;
    }
 
    function distanceTo($point) {
        $x2 = ($this->x - $point->x) * ($this->x - $point->x);
        $y2 = ($this->y - $point->y) * ($this->y - $point->y);
        return $x2 + $y2;
    }
 
}
 
class ScoreToAlignment {
 
    public $points;
    public $fixed;
 
    function __construct($xs, $ys, $ids) {

        $array = array();
        for ($i = 0; $i < $xs.length(); $i++) {
            $array[$i] = new Point($xs[$i], $ys[$i], $ids[$i]);
        }

        $this->points = $array;
        $this->fixed = array(
            new Point(-1, 1),
            new Point(0, 1),
            new Point(1, 1),
            new Point(-1, 0),
            new Point(0, 0),
            new Point(1, 0),
            new Point(-1, -1),
            new Point(0, -1),
            new Point(1, -1)
        );
    }
 
    function calcDistance() {
        $distance = 0;
        for ($i = 0; $i < 9; $i++) {
            $distance += $this->points[$i]->distanceTo($this->fixed[$i]);
        }
        return $distance;
    }
 
    function swap($elements, $i, $j) {
        $temp = $elements[$i];
        $elements[$i] = $elements[$j];
        $elements[$j] = $temp;
        return $elements;
    }
 
    function reverse($elements, $i, $j) {
        for ($x = 0; $x < round(($j-$i)/2); $x++) {
            $elements = $this->swap($elements, $i+$x, $j-$x);
        }
        return $elements;
    }

    function next_permutation() {
        $i = 7;
        while ($i >= 0 && ($this->points[$i] >= $this->points[$i+1])) {
            $i--;
        }
 
        if ($i < 0) {
            $this->points = $this->reverse($this->points, 0, 8);
        } else {
            $j = 8;
            while (($j > $i + 1) && ($this->points[$j] <= $this->points[$i])) {
                $j--;
            }
            $this->points = $this->swap($this->points, $i, $j);
            $this->points = $this->reverse($this->points, $i + 1, 8);
        }
    }
 
    function go() {
        $min = 10000;
        $bestPerm = $this->points;
        for ($i = 0; $i < 362880; $i++) {
            $d = $this->calcDistance();
            if ($d < $min) {
                $min = $d;
                $bestPerm = $this->points;
            }
            $this->next_permutation();
        }
        return $bestPerm;
       
    }
 
}
 
$points = array(
    new Point(-.5,.5),
    new Point(0, .5),
    new Point(.5, .5),
    new Point(-.5, 0),
    new Point(0, 0),
    new Point(.5, 0),
    new Point(-.5, -.5),
    new Point(0, -.5),
    new Point(.5, 0)
);
 
// $o = new ScoreToAlignment($points);
// var_dump($o->go());

?>