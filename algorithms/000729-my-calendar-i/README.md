729\. My Calendar I

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Design`, `Segment Tree`, `Ordered Set`

You are implementing a program to use as your calendar. We can add a new event if adding the event will not cause a **double booking**.

A **double booking** happens when two events have some non-empty intersection (i.e., some moment is common to both events.).

The event can be represented as a pair of integers `start` and `end` that represents a booking on the half-open interval `[start, end)`, the range of real numbers `x` such that `start <= x < end`.

Implement the `MyCalendar` class:

- `MyCalendar()` Initializes the calendar object.
- `boolean book(int start, int end)` Returns _`true` if the event can be added to the calendar successfully without causing a **double booking**_. Otherwise, return _`false` and do not add the event to the calendar_.


**Example 1:**

- **Input:**\
  ["MyCalendar", "book", "book", "book"]\
  [[], [10, 20], [15, 25], [20, 30]]
- **Output:** [null, true, false, true]
- **Explanation:**\
  MyCalendar myCalendar = new MyCalendar();\
  myCalendar.book(10, 20); // return True\
  myCalendar.book(15, 25); // return False, It can not be booked because time 15 is already booked by another event.\
  myCalendar.book(20, 30); // return True, The event can be booked, as the first event takes every time less than 20, but not including 20.\


**Constraints:**

- <code>0 <= start < end <= 10<sup>9</sup></code>
- At most `1000` calls will be made to `book`.


**Hint:**
1. Store the events as a sorted list of intervals. If none of the events conflict, then the new event can be added.



**Solution:**

We need to store each event and check if the new event conflicts with any of the existing events before booking it. Since at most 1000 calls to `book` are allowed, we can store the events in a list and iterate through them to check for overlaps when booking new events.

### Plan:
1. **Storing Events**: We'll maintain a list where each entry is a pair `[start, end]` representing the booked time intervals.
2. **Check for Conflicts**: Before adding a new event, we'll iterate through the list of booked events and check if the new event conflicts with any existing event. An overlap occurs if the new event's start time is less than the end time of an existing event and the new event's end time is greater than the start time of an existing event.
3. **Book Event**: If no conflicts are found, we add the new event to our list of bookings.

Let's implement this solution in PHP: **[729. My Calendar I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000729-my-calendar-i/solution.php)**

```php
<?php
class MyCalendar {
    /**
     * @var array
     */
    private $events;

    /**
     */
    function __construct() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Books an event if it does not cause a double booking
     *
     * @param Integer $start
     * @param Integer $end
     * @return Boolean
     */
    function book($start, $end) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * Your MyCalendar object will be instantiated and called as such:
 * $obj = MyCalendar();
 * $ret_1 = $obj->book($start, $end);
 */

// Example Usage:
$myCalendar = new MyCalendar();
var_dump($myCalendar->book(10, 20)); // true, no conflicts, booking added
var_dump($myCalendar->book(15, 25)); // false, conflict with [10, 20]
var_dump($myCalendar->book(20, 30)); // true, no conflicts, booking added
?>
```

### Explanation:

1. **Constructor (`__construct`)**: Initializes an empty array `$events` to keep track of all booked events.

2. **Booking Function (`book`)**:
   - It takes the start and end of a new event.
   - It iterates through the list of previously booked events and checks for any overlap:
      - An overlap happens if the new event starts before an existing event ends (`$start < $bookedEnd`) **and** ends after an existing event starts (`$end > $bookedStart`).
   - If any overlap is found, the function returns `false`, meaning the event cannot be booked.
   - If no conflicts are found, the event is added to the `$events` array, and the function returns `true` to indicate successful booking.

### Time Complexity:
- **Booking an Event**: Each call to `book` involves checking the new event against all previously booked events. This leads to a time complexity of `O(n)` for each booking operation, where `n` is the number of previously booked events.
- **Space Complexity**: The space complexity is `O(n)` because we store up to `n` events in the array.

### Example Walkthrough:

1. **First Booking (`book(10, 20)`)**:
   - No previous events, so the event `[10, 20]` is successfully booked.
   - Output: `true`

2. **Second Booking (`book(15, 25)`)**:
   - The new event `[15, 25]` conflicts with the previously booked event `[10, 20]` because there is an overlap in the time interval (15 is between 10 and 20).
   - Output: `false`

3. **Third Booking (`book(20, 30)`)**:
   - The new event `[20, 30]` does not overlap with `[10, 20]` because the start time of the new event is exactly when the first event ends (no overlap since it's a half-open interval).
   - Output: `true`

This simple approach efficiently handles up to 1000 events while maintaining clarity and correctness.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
