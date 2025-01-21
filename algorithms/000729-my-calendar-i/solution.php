<?php

class MyCalendar {
    /**
     * @var array
     */
    private $events;

    /**
     */
    function __construct() {
        // Initialize an empty array to store the booked events
        $this->events = [];
    }

    /**
     * Books an event if it does not cause a double booking
     *
     * @param Integer $start
     * @param Integer $end
     * @return Boolean
     */
    function book($start, $end) {
        // Check for any conflicts with existing events
        foreach ($this->events as $event) {
            $bookedStart = $event[0];
            $bookedEnd = $event[1];
            // Overlap occurs if the new event's start is before the end of the current event
            // and the new event's end is after the start of the current event
            if ($start < $bookedEnd && $end > $bookedStart) {
                return false; // Conflict found, booking not possible
            }
        }
        // No conflicts found, add the new event
        $this->events[] = [$start, $end];
        return true;
    }
}

/**
 * Your MyCalendar object will be instantiated and called as such:
 * $obj = MyCalendar();
 * $ret_1 = $obj->book($start, $end);
 */