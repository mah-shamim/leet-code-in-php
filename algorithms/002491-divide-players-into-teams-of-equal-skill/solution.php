<?php

class Solution {

    /**
     * @param Integer[] $skill
     * @return Integer
     */
    function dividePlayers($skill) {
        // Sort the skill array
        sort($skill);

        // Initialize variables
        $n = count($skill);
        $totalChemistry = 0;
        $teamSkillSum = $skill[0] + $skill[$n - 1];  // Expected team sum

        // Two-pointer approach to form teams
        for ($i = 0, $j = $n - 1; $i < $j; $i++, $j--) {
            // Check if the team formed by skill[i] and skill[j] has the correct sum
            if ($skill[$i] + $skill[$j] != $teamSkillSum) {
                return -1;  // Teams can't be formed with equal total skill
            }
            // Add the chemistry of the team to the total
            $totalChemistry += $skill[$i] * $skill[$j];
        }

        // Return the total chemistry of all the teams
        return $totalChemistry;
    }
}