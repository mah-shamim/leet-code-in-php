<?php

class Solution {

    /**
     * @param Integer $numberOfUsers
     * @param String[][] $events
     * @return Integer[]
     */
    function countMentions($numberOfUsers, $events) {
        // Sort events by timestamp
        usort($events, function($a, $b) {
            $timeA = (int)$a[1];
            $timeB = (int)$b[1];
            if ($timeA === $timeB) {
                // If same timestamp, ensure OFFLINE events come before MESSAGE events
                $order = ['OFFLINE' => 0, 'MESSAGE' => 1];
                return $order[$a[0]] <=> $order[$b[0]];
            }
            return $timeA <=> $timeB;
        });

        // Initialize mentions count for each user
        $mentions = array_fill(0, $numberOfUsers, 0);

        // Track when each user comes back online (timestamp)
        $offlineUntil = array_fill(0, $numberOfUsers, 0);

        // Process events in order
        foreach ($events as $event) {
            $type = $event[0];
            $timestamp = (int)$event[1];

            // First, check if any users should come back online at this timestamp
            for ($i = 0; $i < $numberOfUsers; $i++) {
                if ($offlineUntil[$i] > 0 && $timestamp >= $offlineUntil[$i]) {
                    $offlineUntil[$i] = 0; // User is back online
                }
            }

            if ($type === 'OFFLINE') {
                $userId = (int)$event[2];
                // User goes offline for 60 time units
                $offlineUntil[$userId] = $timestamp + 60;
            }
            elseif ($type === 'MESSAGE') {
                $mentionsStr = $event[2];

                if ($mentionsStr === 'ALL') {
                    // Mention all users
                    for ($i = 0; $i < $numberOfUsers; $i++) {
                        $mentions[$i]++;
                    }
                }
                elseif ($mentionsStr === 'HERE') {
                    // Mention only online users
                    for ($i = 0; $i < $numberOfUsers; $i++) {
                        if ($offlineUntil[$i] === 0) { // User is online
                            $mentions[$i]++;
                        }
                    }
                }
                else {
                    // Parse individual user mentions
                    $tokens = explode(' ', $mentionsStr);
                    foreach ($tokens as $token) {
                        if (strpos($token, 'id') === 0) {
                            $userId = (int)substr($token, 2);
                            if ($userId >= 0 && $userId < $numberOfUsers) {
                                $mentions[$userId]++;
                            }
                        }
                    }
                }
            }
        }

        return $mentions;
    }
}