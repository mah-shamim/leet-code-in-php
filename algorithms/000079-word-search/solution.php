<?php

class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist(array $board, string $word): bool
    {
        for ($i = 0; $i < count($board); ++$i)
            for ($j = 0; $j < count($board[0]); ++$j)
                if ($this->dfs($board, $word, $i, $j, 0))
                    return true;
        return false;
    }

    private function dfs($board, $word, $i, $j, $s): bool
    {
        if ($i < 0 || $i == count($board) || $j < 0 || $j == count($board[0]))
            return false;
        if ($board[$i][$j] != $word[$s] || $board[$i][$j] == '*')
            return false;
        if ($s == strlen($word) - 1)
            return true;

        $cache = $board[$i][$j];
        $board[$i][$j] = '*';
        $isExist = $this->dfs($board, $word, $i + 1, $j, $s + 1) ||
            $this->dfs($board, $word, $i - 1, $j, $s + 1) ||
            $this->dfs($board, $word, $i, $j + 1, $s + 1) ||
            $this->dfs($board, $word, $i, $j - 1, $s + 1);
        $board[$i][$j] = $cache;

        return $isExist;
    }
}