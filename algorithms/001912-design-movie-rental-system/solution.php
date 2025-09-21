<?php

class MovieRentingSystem {
    private $prices;
    private $rented;
    private $movieHeaps;
    private $rentedHeap;
    private $inRentedHeap;

    /**
     * @param Integer $n
     * @param Integer[][] $entries
     */
    function __construct($n, $entries) {
        $this->prices = [];
        $this->rented = [];
        $this->movieHeaps = [];
        $this->rentedHeap = new SplMinHeap();
        $this->inRentedHeap = [];

        foreach ($entries as $e) {
            $shop = $e[0];
            $movie = $e[1];
            $price = $e[2];
            $key = $shop . ',' . $movie;
            $this->prices[$key] = $price;
            $this->rented[$key] = false;
            if (!isset($this->movieHeaps[$movie])) {
                $this->movieHeaps[$movie] = new SplMinHeap();
            }
            $this->movieHeaps[$movie]->insert([$price, $shop]);
            $this->inRentedHeap[$key] = false;
        }
    }

    /**
     * @param Integer $movie
     * @return Integer[]
     */
    function search($movie) {
        if (!isset($this->movieHeaps[$movie])) {
            return [];
        }
        $heap = $this->movieHeaps[$movie];
        $result = [];
        $temp = [];

        while (count($result) < 5 && $heap->valid()) {
            list($price, $shop) = $heap->current();
            $heap->next();
            $key = $shop . ',' . $movie;
            if (!$this->rented[$key]) {
                $result[] = $shop;
            }
            $temp[] = [$price, $shop];
        }
        foreach ($temp as $item) {
            $heap->insert($item);
        }
        return $result;
    }

    /**
     * @param Integer $shop
     * @param Integer $movie
     * @return NULL
     */
    function rent($shop, $movie) {
        $key = $shop . ',' . $movie;
        $this->rented[$key] = true;
        if (!$this->inRentedHeap[$key]) {
            $price = $this->prices[$key];
            $this->rentedHeap->insert([$price, $shop, $movie]);
            $this->inRentedHeap[$key] = true;
        }
    }

    /**
     * @param Integer $shop
     * @param Integer $movie
     * @return NULL
     */
    function drop($shop, $movie) {
        $key = $shop . ',' . $movie;
        $this->rented[$key] = false;
    }

    /**
     * @return Integer[][]
     */
    function report() {
        $result = [];
        $temp = [];

        while (count($result) < 5 && $this->rentedHeap->valid()) {
            list($price, $shop, $movie) = $this->rentedHeap->current();
            $this->rentedHeap->next();
            $key = $shop . ',' . $movie;
            if ($this->rented[$key]) {
                $result[] = [$shop, $movie];
                $temp[] = [$price, $shop, $movie];
            }
            $this->inRentedHeap[$key] = false;
        }
        foreach ($temp as $item) {
            list($price, $shop, $movie) = $item;
            $this->rentedHeap->insert([$price, $shop, $movie]);
            $key = $shop . ',' . $movie;
            $this->inRentedHeap[$key] = true;
        }
        return $result;
    }
}

/**
 * Your MovieRentingSystem object will be instantiated and called as such:
 * $obj = MovieRentingSystem($n, $entries);
 * $ret_1 = $obj->search($movie);
 * $obj->rent($shop, $movie);
 * $obj->drop($shop, $movie);
 * $ret_4 = $obj->report();
 */