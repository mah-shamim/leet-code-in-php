<?php

class Solution {

    /**
     * @param String[] $words
     * @return Integer[]
     */
    function sumPrefixScores($words) {
        $trie = new Trie();

        // Step 1: Insert all words into the Trie
        foreach ($words as $word) {
            $trie->insert($word);
        }

        // Step 2: Calculate prefix scores for each word
        $result = [];
        foreach ($words as $word) {
            $result[] = $trie->getPrefixScores($word);
        }

        return $result;
    }
}

class TrieNode {
    /**
     * @var array
     */
    public $children;
    /**
     * @var int
     */
    public $count;

    public function __construct() {
        $this->children = [];
        $this->count = 0;
    }
}

class Trie {
    /**
     * @var TrieNode
     */
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Insert a word into the Trie and update the prefix counts
     *
     * @param $word
     * @return void
     */
    public function insert($word) {
        $node = $this->root;
        foreach (str_split($word) as $char) {
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
            $node->count++; // Increase the count at this node
        }
    }

    /**
     * Get the sum of prefix scores for a given word
     *
     * @param $word
     * @return int
     */
    public function getPrefixScores($word) {
        $node = $this->root;
        $prefixScore = 0;
        foreach (str_split($word) as $char) {
            if (!isset($node->children[$char])) {
                break;
            }
            $node = $node->children[$char];
            $prefixScore += $node->count;
        }
        return $prefixScore;
    }
}
