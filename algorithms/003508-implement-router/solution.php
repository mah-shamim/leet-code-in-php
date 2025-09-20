<?php

class Router {
    private $memoryLimit;
    private $queue;
    private $set;
    private $byDestination;

    /**
     * @param Integer $memoryLimit
     */
    function __construct($memoryLimit) {
        $this->memoryLimit = $memoryLimit;
        $this->queue = new SplQueue();
        $this->set = [];
        $this->byDestination = [];
    }

    /**
     * @param Integer $source
     * @param Integer $destination
     * @param Integer $timestamp
     * @return Boolean
     */
    function addPacket($source, $destination, $timestamp) {
        $key = "$source,$destination,$timestamp";
        if (isset($this->set[$key])) {
            return false;
        }

        if ($this->queue->count() >= $this->memoryLimit) {
            $this->removeOldestPacket();
        }

        $this->queue->enqueue([$source, $destination, $timestamp]);
        $this->set[$key] = true;

        if (!isset($this->byDestination[$destination])) {
            $this->byDestination[$destination] = [];
        }
        $this->byDestination[$destination][] = $timestamp;
        return true;
    }

    /**
     * @return Integer[]
     */
    function forwardPacket() {
        if ($this->queue->isEmpty()) {
            return [];
        }

        $packet = $this->queue->dequeue();
        list($source, $destination, $timestamp) = $packet;
        $key = "$source,$destination,$timestamp";
        unset($this->set[$key]);

        if (isset($this->byDestination[$destination])) {
            $arr = &$this->byDestination[$destination];
            $index = $this->binarySearchFirst($arr, $timestamp);
            if ($index !== -1) {
                array_splice($arr, $index, 1);
            }
            if (empty($arr)) {
                unset($this->byDestination[$destination]);
            }
        }

        return $packet;
    }

    /**
     * @param Integer $destination
     * @param Integer $startTime
     * @param Integer $endTime
     * @return Integer
     */
    function getCount($destination, $startTime, $endTime) {
        if (!isset($this->byDestination[$destination])) {
            return 0;
        }

        $arr = $this->byDestination[$destination];
        $n = count($arr);
        $firstIndex = $this->findFirstIndex($arr, $startTime);
        if ($firstIndex === -1) {
            return 0;
        }
        $lastIndex = $this->findLastIndex($arr, $endTime, $firstIndex);
        if ($lastIndex === -1) {
            return 0;
        }
        return $lastIndex - $firstIndex + 1;
    }

    /**
     * @return void
     */
    private function removeOldestPacket() {
        $packet = $this->queue->dequeue();
        list($source, $destination, $timestamp) = $packet;
        $key = "$source,$destination,$timestamp";
        unset($this->set[$key]);

        if (isset($this->byDestination[$destination])) {
            $arr = &$this->byDestination[$destination];
            $index = $this->binarySearchFirst($arr, $timestamp);
            if ($index !== -1) {
                array_splice($arr, $index, 1);
            }
            if (empty($arr)) {
                unset($this->byDestination[$destination]);
            }
        }
    }

    /**
     * @param $arr
     * @param $value
     * @return int
     */
    private function binarySearchFirst($arr, $value) {
        $low = 0;
        $high = count($arr) - 1;
        $result = -1;
        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            if ($arr[$mid] == $value) {
                $result = $mid;
                $high = $mid - 1;
            } elseif ($arr[$mid] < $value) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }
        return $result;
    }

    /**
     * @param $arr
     * @param $startTime
     * @return int
     */
    private function findFirstIndex($arr, $startTime) {
        $low = 0;
        $high = count($arr) - 1;
        $result = -1;
        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            if ($arr[$mid] >= $startTime) {
                $result = $mid;
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        return $result;
    }

    /**
     * @param $arr
     * @param $endTime
     * @param $startIndex
     * @return int
     */
    private function findLastIndex($arr, $endTime, $startIndex) {
        $low = $startIndex;
        $high = count($arr) - 1;
        $result = -1;
        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            if ($arr[$mid] <= $endTime) {
                $result = $mid;
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }
        return $result;
    }
}

/**
 * Your Router object will be instantiated and called as such:
 * $obj = Router($memoryLimit);
 * $ret_1 = $obj->addPacket($source, $destination, $timestamp);
 * $ret_2 = $obj->forwardPacket();
 * $ret_3 = $obj->getCount($destination, $startTime, $endTime);
 */