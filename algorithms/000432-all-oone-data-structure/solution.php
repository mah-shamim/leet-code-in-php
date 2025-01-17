<?php

class Node {
    /**
     * @var
     */
    public $count;
    /**
     * @var array
     */
    public $keys;
    /**
     * @var null
     */
    public $prev;
    /**
     * @var null
     */
    public $next;

    /**
     * @param $count
     */
    public function __construct($count) {
        $this->count = $count;
        $this->keys = [];
        $this->prev = null;
        $this->next = null;
    }
}

class AllOne {
    /**
     * @var array
     */
    private $key_to_node;
    /**
     * @var array
     */
    private $counts;
    /**
     * @var Node
     */
    private $head;
    /**
     * @var Node
     */
    private $tail;

    /**
     */
    function __construct() {
        $this->key_to_node = [];
        $this->counts = [];
        $this->head = new Node(null); // Dummy head
        $this->tail = new Node(null); // Dummy tail
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
    }

    /**
     * Insert a new node after a given node
     *
     * @param $newNode
     * @param $prevNode
     * @return void
     */
    private function insertAfter($newNode, $prevNode) {
        $newNode->next = $prevNode->next;
        $newNode->prev = $prevNode;
        $prevNode->next->prev = $newNode;
        $prevNode->next = $newNode;
    }

    /**
     * Remove a node from the linked list
     *
     * @param $node
     * @return void
     */
    private function removeNode($node) {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
        unset($this->counts[$node->count]);
    }

    /**
     * Increments the count of a key
     *
     * @param String $key
     * @return NULL
     */
    function inc($key) {
        if (!isset($this->key_to_node[$key])) {
            // Key does not exist, insert with count 1
            if (!isset($this->counts[1])) {
                $newNode = new Node(1);
                $this->insertAfter($newNode, $this->head);
                $this->counts[1] = $newNode;
            }
            $this->counts[1]->keys[$key] = true;
            $this->key_to_node[$key] = $this->counts[1];
        } else {
            // Key exists, increment its count
            $curNode = $this->key_to_node[$key];
            $curCount = $curNode->count;
            $newCount = $curCount + 1;

            // Move the key to the next count node
            unset($curNode->keys[$key]);
            if (!isset($this->counts[$newCount])) {
                $newNode = new Node($newCount);
                $this->insertAfter($newNode, $curNode);
                $this->counts[$newCount] = $newNode;
            }
            $this->counts[$newCount]->keys[$key] = true;
            $this->key_to_node[$key] = $this->counts[$newCount];

            // Remove the old node if empty
            if (empty($curNode->keys)) {
                $this->removeNode($curNode);
            }
        }
    }

    /**
     * Decrements the count of a key
     *
     * @param String $key
     * @return NULL
     */
    function dec($key) {
        if (!isset($this->key_to_node[$key])) return;

        $curNode = $this->key_to_node[$key];
        $curCount = $curNode->count;
        $newCount = $curCount - 1;

        // Remove the key from the current node
        unset($curNode->keys[$key]);

        // If the new count is 0, completely remove the key
        if ($newCount == 0) {
            unset($this->key_to_node[$key]);
        } else {
            // Move the key to the previous count node
            if (!isset($this->counts[$newCount])) {
                $newNode = new Node($newCount);
                $this->insertAfter($newNode, $curNode->prev);
                $this->counts[$newCount] = $newNode;
            }
            $this->counts[$newCount]->keys[$key] = true;
            $this->key_to_node[$key] = $this->counts[$newCount];
        }

        // Remove the old node if empty
        if (empty($curNode->keys)) {
            $this->removeNode($curNode);
        }
    }

    /**
     * Returns one of the keys with the maximum count
     *
     * @return String
     */
    function getMaxKey() {
        if ($this->tail->prev === $this->head) return "";
        return key($this->tail->prev->keys);
    }

    /**
     * Returns one of the keys with the minimum count
     *
     * @return String
     */
    function getMinKey() {
        if ($this->head->next === $this->tail) return "";
        return key($this->head->next->keys);
    }
}

/**
 * Your AllOne object will be instantiated and called as such:
 * $obj = AllOne();
 * $obj->inc($key);
 * $obj->dec($key);
 * $ret_3 = $obj->getMaxKey();
 * $ret_4 = $obj->getMinKey();
 */
