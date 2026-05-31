<?php

class Solution {

    /**
     * @param Integer $mass
     * @param Integer[] $asteroids
     * @return Boolean
     */
    function asteroidsDestroyed(int $mass, array $asteroids): bool
    {
        sort($asteroids);

        $currentMass = $mass;

        foreach ($asteroids as $asteroid) {
            if ($currentMass >= $asteroid) {
                $currentMass += $asteroid;
            } else {
                return false;
            }
        }

        return true;
    }
}