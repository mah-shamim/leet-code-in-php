<?php

class TaskManager {
    private $taskInfo;
    private $generations;
    private $heap;

    /**
     * @param Integer[][] $tasks
     */
    function __construct($tasks) {
        $this->taskInfo = [];
        $this->generations = [];
        $this->heap = new CustomMaxHeap();
        foreach ($tasks as $task) {
            $this->add($task[0], $task[1], $task[2]);
        }
    }

    /**
     * @param Integer $userId
     * @param Integer $taskId
     * @param Integer $priority
     * @return NULL
     */
    function add($userId, $taskId, $priority) {
        if (!isset($this->generations[$taskId])) {
            $this->generations[$taskId] = 0;
        } else {
            $this->generations[$taskId]++;
        }
        $gen = $this->generations[$taskId];
        $this->taskInfo[$taskId] = [$userId, $priority, $gen];
        $this->heap->insert([$priority, $taskId, $userId, $gen]);
    }

    /**
     * @param Integer $taskId
     * @param Integer $newPriority
     * @return NULL
     */
    function edit($taskId, $newPriority) {
        $this->generations[$taskId]++;
        $gen = $this->generations[$taskId];
        $userId = $this->taskInfo[$taskId][0];
        $this->taskInfo[$taskId] = [$userId, $newPriority, $gen];
        $this->heap->insert([$newPriority, $taskId, $userId, $gen]);
    }

    /**
     * @param Integer $taskId
     * @return NULL
     */
    function rmv($taskId) {
        unset($this->taskInfo[$taskId]);
    }

    /**
     * @return Integer
     */
    function execTop() {
        while (!$this->heap->isEmpty()) {
            $top = $this->heap->extract();
            list($p, $taskId, $userId, $gen) = $top;
            if (isset($this->taskInfo[$taskId]) && $this->taskInfo[$taskId][2] === $gen) {
                unset($this->taskInfo[$taskId]);
                return $userId;
            }
        }
        return -1;
    }
}

class CustomMaxHeap extends SplMaxHeap {
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b): int {
        if ($a[0] != $b[0]) {
            return $a[0] - $b[0];
        }
        return $a[1] - $b[1];
    }
}

/**
 * Your TaskManager object will be instantiated and called as such:
 * $obj = TaskManager($tasks);
 * $obj->add($userId, $taskId, $priority);
 * $obj->edit($taskId, $newPriority);
 * $obj->rmv($taskId);
 * $ret_4 = $obj->execTop();
 */