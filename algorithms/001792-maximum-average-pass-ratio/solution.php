<?php

class Solution {

    /**
     * @param Integer[][] $classes
     * @param Integer $extraStudents
     * @return Float
     */
    function maxAverageRatio($classes, $extraStudents) {
        // Create a max-heap using a priority queue
        $maxHeap = new SplPriorityQueue();

        // Populate the heap with the classes and their extra pass ratio
        foreach ($classes as $class) {
            list($pass, $total) = $class;
            $extraRatio = $this->extraPassRatio($pass, $total);
            $maxHeap->insert([$pass, $total], $extraRatio);
        }

        // Distribute the extra students
        for ($i = 0; $i < $extraStudents; ++$i) {
            list($pass, $total) = $maxHeap->extract();
            $pass += 1;
            $total += 1;
            $extraRatio = $this->extraPassRatio($pass, $total);
            $maxHeap->insert([$pass, $total], $extraRatio);
        }

        // Calculate the average pass ratio
        $totalRatio = 0;
        $count = count($classes);

        while (!$maxHeap->isEmpty()) {
            list($pass, $total) = $maxHeap->extract();
            $totalRatio += $pass / $total;
        }

        return $totalRatio / $count;
    }

    /**
     * Calculate the extra pass ratio when a student is added to the class
     *
     * @param $pass
     * @param $total
     * @return float|int
     */
    private function extraPassRatio($pass, $total)
    {
        return ($pass + 1) / ($total + 1) - $pass / $total;
    }
}
