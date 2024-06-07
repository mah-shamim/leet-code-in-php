<?php

class Solution {

    private $root;
    public function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return String
     */
    function replaceWords($dictionary, $sentence) {
        foreach ($dictionary as $word) {
            $this->insert($word);
        }

        $ans = '';
        $iss = explode(' ', $sentence);

        foreach ($iss as $s) {
            $ans .= $this->search($s) . ' ';
        }
        $ans = rtrim($ans);

        return $ans;
    }

    private function insert($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $c = $word[$i];
            $index = ord($c) - ord('a');
            if ($node->children[$index] == null) {
                $node->children[$index] = new TrieNode();
            }
            $node = $node->children[$index];
        }
        $node->word = $word;
    }

    private function search($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $c = $word[$i];
            if ($node->word != null) {
                return $node->word;
            }
            $index = ord($c) - ord('a');
            if ($node->children[$index] == null) {
                return $word;
            }
            $node = $node->children[$index];
        }
        return $word;
    }
}

class TrieNode {
    public $children;
    public $word;

    public function __construct() {
        $this->children = array_fill(0, 26, null);
        $this->word = null;
    }
}