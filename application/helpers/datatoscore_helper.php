<?php

class datatoscore {

    public $eScore;
    public $mScore;

    function __construct($list) {
        
        // We assume that list length is even
        $bound = count($list)/2;

        // Parse ethical questions
        $this->eScore = 0;
        for ($i = 0; $i < $bound; $i++) {
            $this->eScore += $list[$i]; 
        }
        // Shift interval to [-1,1]
        $this->eScore = ($this->eScore*2) / (3*$bound) - 1;

        // Parse moral questions
        $this->mScore= 0;
        for ($i = $bound; $i < count($list); $i++) {
            $this->mScore += $list[$i]; 
        }
        // Shift interval to [-1,1]
        $this->mScore = ($this->mScore*2) / (3*$bound) - 1;

    }

}

?>