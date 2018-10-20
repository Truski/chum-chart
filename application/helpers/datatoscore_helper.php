<?php

class datatoscore {

    public $eScore;
    public $mScore;

    function __construct($list) {
        
        // We assume that list length is even
        $bound = $list.length()/2;

        // Parse ethical questions
        $eScore = 0;
        for ($i = 0; $i < $bound; $i++) {
            $eScore += $list[$i]; 
        }
        // Shift interval to [-1,1]
        $eScore = ($eScore*2) / (3*$bound) - 1;

        // Parse moral questions
        $mScore= 0;
        for ($i = $bound; $i < $list.length(); $i++) {
            $mScore += $list[$i]; 
        }
        // Shift interval to [-1,1]
        $mScore = ($mScore*2) / (3*$bound) - 1;

    }

}

?>