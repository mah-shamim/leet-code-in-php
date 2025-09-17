<?php

class FoodRatings {
    private $foodInfo;
    private $cuisineHeaps;

    /**
     * @param String[] $foods
     * @param String[] $cuisines
     * @param Integer[] $ratings
     */
    function __construct($foods, $cuisines, $ratings) {
        $this->foodInfo = [];
        $this->cuisineHeaps = [];

        $n = count($foods);
        for ($i = 0; $i < $n; $i++) {
            $food = $foods[$i];
            $cuisine = $cuisines[$i];
            $rating = $ratings[$i];
            $this->foodInfo[$food] = [$cuisine, $rating];
            if (!isset($this->cuisineHeaps[$cuisine])) {
                $this->cuisineHeaps[$cuisine] = new MyMaxHeap();
            }
            $this->cuisineHeaps[$cuisine]->insert([$rating, $food]);
        }
    }

    /**
     * @param String $food
     * @param Integer $newRating
     * @return NULL
     */
    function changeRating($food, $newRating) {
        list($cuisine, $oldRating) = $this->foodInfo[$food];
        $this->foodInfo[$food] = [$cuisine, $newRating];
        $this->cuisineHeaps[$cuisine]->insert([$newRating, $food]);
    }

    /**
     * @param String $cuisine
     * @return String
     */
    function highestRated($cuisine) {
        $heap = $this->cuisineHeaps[$cuisine];
        while (true) {
            $top = $heap->top();
            list($rating, $food) = $top;
            if ($this->foodInfo[$food][1] == $rating) {
                return $food;
            }
            $heap->extract();
        }
    }
}

class MyMaxHeap extends SplMaxHeap {
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b): int {
        if ($a[0] != $b[0]) {
            return $a[0] - $b[0];
        }
        return strcmp($b[1], $a[1]);
    }
}

/**
 * Your FoodRatings object will be instantiated and called as such:
 * $obj = FoodRatings($foods, $cuisines, $ratings);
 * $obj->changeRating($food, $newRating);
 * $ret_2 = $obj->highestRated($cuisine);
 */