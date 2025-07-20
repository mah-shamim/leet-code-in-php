<?php

class Solution {

    /**
     * @param String[][] $paths
     * @return String[][]
     */
    function deleteDuplicateFolder($paths) {
        $root = new Node();

        foreach ($paths as $path) {
            $node = $root;
            foreach ($path as $folder) {
                if (!isset($node->children[$folder])) {
                    $node->children[$folder] = new Node();
                }
                $node = $node->children[$folder];
            }
        }

        $hashCount = [];

        $dfs = function($node) use (&$dfs, &$hashCount) {
            if (empty($node->children)) {
                return "()";
            }
            $keys = array_keys($node->children);
            sort($keys);
            $rep = '';
            foreach ($keys as $key) {
                $childRep = $dfs($node->children[$key]);
                $rep .= $key . $childRep;
            }
            $rep = '(' . $rep . ')';
            $node->hash = $rep;
            if (!isset($hashCount[$rep])) {
                $hashCount[$rep] = 1;
            } else {
                $hashCount[$rep]++;
            }
            return $rep;
        };

        foreach ($root->children as $child) {
            $dfs($child, $hashCount);
        }

        $markNodes = function($node) use (&$markNodes, $hashCount) {
            if (!empty($node->children)) {
                if ($hashCount[$node->hash] >= 2) {
                    $node->deleted = true;
                }
            }
            foreach ($node->children as $child) {
                $markNodes($child, $hashCount);
            }
        };

        foreach ($root->children as $child) {
            $markNodes($child, $hashCount);
        }

        $result = [];
        $stack = new SplStack();
        $stack->push([$root, []]);

        while (!$stack->isEmpty()) {
            list($node, $path) = $stack->pop();
            foreach ($node->children as $name => $child) {
                if ($child->deleted) {
                    continue;
                }
                $newPath = $path;
                $newPath[] = $name;
                $result[] = $newPath;
                $stack->push([$child, $newPath]);
            }
        }

        return $result;
    }
}