<?php

class Solution {

    /**
     * @param String[] $recipes
     * @param String[][] $ingredients
     * @param String[] $supplies
     * @return String[]
     */
    function findAllRecipes($recipes, $ingredients, $supplies) {
        $suppliesSet = array_flip($supplies);
        $recipeNameMap = array();
        foreach ($recipes as $idx => $r) {
            $recipeNameMap[$r] = $idx;
        }

        $validRecipes = array();
        $inDegree = array();
        $adjacency = array();

        foreach ($recipes as $i => $recipe) {
            $currentIngredients = $ingredients[$i];
            $isValid = true;
            foreach ($currentIngredients as $ing) {
                if (!isset($suppliesSet[$ing]) && !isset($recipeNameMap[$ing])) {
                    $isValid = false;
                    break;
                }
            }
            if ($isValid) {
                $dependencies = array();
                foreach ($currentIngredients as $ing) {
                    if (isset($recipeNameMap[$ing]) && !isset($suppliesSet[$ing])) {
                        $dependencies[] = $ing;
                    }
                }
                $inDegree[$recipe] = count($dependencies);
                foreach ($dependencies as $dep) {
                    if (!isset($adjacency[$dep])) {
                        $adjacency[$dep] = array();
                    }
                    $adjacency[$dep][] = $recipe;
                }
                $validRecipes[] = $recipe;
            }
        }

        $queue = array();
        foreach ($validRecipes as $r) {
            if ($inDegree[$r] == 0) {
                array_push($queue, $r);
            }
        }

        $result = array();
        while (!empty($queue)) {
            $current = array_shift($queue);
            array_push($result, $current);
            if (isset($adjacency[$current])) {
                foreach ($adjacency[$current] as $dependent) {
                    $inDegree[$dependent]--;
                    if ($inDegree[$dependent] == 0) {
                        array_push($queue, $dependent);
                    }
                }
            }
        }

        return $result;
    }
}