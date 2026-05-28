<?php

class Solution {

    /**
     * @param String[] $wordsContainer
     * @param String[] $wordsQuery
     * @return Integer[]
     */
    function stringIndices(array $wordsContainer, array $wordsQuery): array
    {
        $root = new TrieNode();

        // Insert all container words into trie (reversed)
        $n = count($wordsContainer);
        for ($i = 0; $i < $n; $i++) {
            $word = $wordsContainer[$i];
            $len = strlen($word);

            // Update best at root
            if ($len < $root->bestLength || ($len == $root->bestLength && $i < $root->bestIndex)) {
                $root->bestLength = $len;
                $root->bestIndex = $i;
            }

            $node = $root;
            $rev = strrev($word);
            for ($j = 0; $j < strlen($rev); $j++) {
                $ch = $rev[$j];
                if (!isset($node->children[$ch])) {
                    $node->children[$ch] = new TrieNode();
                }
                $node = $node->children[$ch];

                // Update best at this node
                if ($len < $node->bestLength || ($len == $node->bestLength && $i < $node->bestIndex)) {
                    $node->bestLength = $len;
                    $node->bestIndex = $i;
                }
            }
        }

        // Process queries
        $m = count($wordsQuery);
        $result = [];
        for ($i = 0; $i < $m; $i++) {
            $query = $wordsQuery[$i];
            $node = $root;
            $rev = strrev($query);
            $lenRev = strlen($rev);
            for ($j = 0; $j < $lenRev; $j++) {
                $ch = $rev[$j];
                if (!isset($node->children[$ch])) {
                    break;
                }
                $node = $node->children[$ch];
            }
            $result[] = $node->bestIndex;
        }

        return $result;
    }
}

class TrieNode {
    public array $children = [];
    public int $bestIndex = -1;
    public int $bestLength = PHP_INT_MAX;
}