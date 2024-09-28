<?php

class MyCircularDeque {
    /**
     * @var array
     */
    private $deque;
    /**
     * @var int
     */
    private $maxSize;
    /**
     * @var int
     */
    private $front;
    /**
     * @var int
     */
    private $rear;
    /**
     * @var int
     */
    private $size;

    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     *
     * @param Integer $k
     */
    function __construct($k) {
        $this->deque = array_fill(0, $k, -1);
        $this->maxSize = $k;
        $this->front = 0;
        $this->rear = 0;
        $this->size = 0;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     *
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if ($this->isFull()) {
            return false;
        }
        // Move the front pointer backward
        $this->front = ($this->front - 1 + $this->maxSize) % $this->maxSize;
        $this->deque[$this->front] = $value;
        $this->size++;
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     *
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->isFull()) {
            return false;
        }
        $this->deque[$this->rear] = $value;
        $this->rear = ($this->rear + 1) % $this->maxSize;
        $this->size++;
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     *
     * @return Boolean
     */
    function deleteFront() {
        if ($this->isEmpty()) {
            return false;
        }
        // Move the front pointer forward
        $this->front = ($this->front + 1) % $this->maxSize;
        $this->size--;
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     *
     * @return Boolean
     */
    function deleteLast() {
        if ($this->isEmpty()) {
            return false;
        }
        // Move the rear pointer backward
        $this->rear = ($this->rear - 1 + $this->maxSize) % $this->maxSize;
        $this->size--;
        return true;
    }

    /**
     * Get the front item from the deque. If the deque is empty, return -1.
     *
     * @return Integer
     */
    function getFront() {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->deque[$this->front];
    }

    /**
     * Get the last item from the deque. If the deque is empty, return -1.
     *
     * @return Integer
     */
    function getRear() {
        if ($this->isEmpty()) {
            return -1;
        }
        // Get the element before the current rear position
        return $this->deque[($this->rear - 1 + $this->maxSize) % $this->maxSize];
    }

    /**
     * Checks whether the deque is empty or not.
     *
     * @return Boolean
     */
    function isEmpty() {
        return $this->size == 0;
    }

    /**
     * Checks whether the deque is full or not.
     *
     * @return Boolean
     */
    function isFull() {
        return $this->size == $this->maxSize;
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */