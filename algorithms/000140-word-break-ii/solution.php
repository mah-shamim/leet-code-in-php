<?php

class Solution {

    private $map = array();

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return String[]
     */
    function wordBreak($s, $wordDict) {
        if(array_key_exists($s, $this->map)) {
            return $this->map[$s];
        }

        $result = array();

        if(strlen($s) == 0){
            $result[] = "";
            $this->map[""] = $result;
            return $result;
        }

        foreach($wordDict as $word) {
            if(strpos($s, $word) === 0){
                $subWords = $this->wordBreak(substr($s, strlen($word)), $wordDict);
                foreach($subWords as $subWord) {
                    $result[] = $word . (strlen($subWord) > 0 ? " " : "") . $subWord;
                }
            }
        }

        $this->map[$s] = $result;
        return $result;
    }
}