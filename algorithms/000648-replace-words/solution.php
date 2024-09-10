<?php

class Solution {
    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return String
     */
    function replaceWords($dictionary, $sentence) {
        // Step 1: Build the Trie with the dictionary of roots
        $trie = new Trie();
        foreach ($dictionary as $root) {
            $trie->insert($root);
        }

        // Step 2: Split the sentence into words
        $words = explode(" ", $sentence);

        // Step 3: For each word, find the root and replace the word if needed
        for ($i = 0; $i < count($words); $i++) {
            $words[$i] = $trie->findRoot($words[$i]);
        }

        // Step 4: Join the words back into a sentence
        return implode(" ", $words);

    }
}

// Define a Trie Node class
class TrieNode {
    /**
     * @var array
     */
    public $children = [];
    /**
     * @var bool
     */
    public $isEndOfWord = false; // Marks the end of a root word
}

// Define a Trie class for storing the dictionary of roots
class Trie {
    /**
     * @var TrieNode
     */
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Insert a word (root) into the Trie
     *
     * @param $word
     * @return void
     */
    public function insert($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }
        $node->isEndOfWord = true; // Mark the end of the root word
    }

    /**
     * Find the shortest root for a given word
     *
     * @param $word
     * @return mixed|string
     */
    public function findRoot($word) {
        $node = $this->root;
        $prefix = "";

        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                break;
            }
            $prefix .= $char;
            $node = $node->children[$char];
            if ($node->isEndOfWord) {
                return $prefix; // Return the root if found
            }
        }
        return $word; // Return the original word if no root is found
    }
}
