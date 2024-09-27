<?php

class MyCalendarTwo {
    /**
     * @var array
     */
    private $singleBookings;
    /**
     * @var array
     */
    private $doubleBookings;

    /**
     */
    function __construct() {
        $this->singleBookings = [];
        $this->doubleBookings = [];
    }

    /**
     * @param Integer $start
     * @param Integer $end
     * @return Boolean
     */
    function book($start, $end) {
        // Check for overlap with double bookings (would result in triple booking)
        foreach ($this->doubleBookings as $booking) {
            $overlapStart = max($start, $booking[0]);
            $overlapEnd = min($end, $booking[1]);
            if ($overlapStart < $overlapEnd) {
                // Overlap with a double booking, hence a triple booking will occur
                return false;
            }
        }

        // Check for overlap with single bookings and add overlap to double bookings
        foreach ($this->singleBookings as $booking) {
            $overlapStart = max($start, $booking[0]);
            $overlapEnd = min($end, $booking[1]);
            if ($overlapStart < $overlapEnd) {
                // There is overlap, so add this overlap to double bookings
                $this->doubleBookings[] = [$overlapStart, $overlapEnd];
            }
        }

        // If no triple booking, add the event to single bookings
        $this->singleBookings[] = [$start, $end];
        return true;
    }
}

/**
 * Your MyCalendarTwo object will be instantiated and called as such:
 * $obj = MyCalendarTwo();
 * $ret_1 = $obj->book($start, $end);
 */