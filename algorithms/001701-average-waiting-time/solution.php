<?php

class Solution {

    /**
     * @param Integer[][] $customers
     * @return Float
     */
    function averageWaitingTime($customers) {
        $currentTime = 0;
        $totalWaitingTime = 0;
        $n = count($customers);

        foreach ($customers as $customer) {
            $arrival = $customer[0];
            $time = $customer[1];

            if ($currentTime < $arrival) {
                $currentTime = $arrival;
            }

            $currentTime += $time;
            $totalWaitingTime += ($currentTime - $arrival);
        }

        return $totalWaitingTime / $n;
    }
}