731\. My Calendar II

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Design`, `Segment Tree`, `Prefix Sum`, `Ordered Set`

You are implementing a program to use as your calendar. We can add a new event if adding the event will not cause a **triple booking**.

A **triple booking** happens when three events have some non-empty intersection (i.e., some moment is common to all the three events.).

The event can be represented as a pair of integers `start` and `end` that represents a booking on the half-open interval `[start, end)`, the range of real numbers `x` such that `start <= x < end`.

Implement the `MyCalendarTwo` class:

- `MyCalendarTwo()` Initializes the calendar object.
- `boolean book(int start, int end)` Returns _`true` if the event can be added to the calendar successfully without causing a **triple booking**_. Otherwise, _`return` false and do not add the event to the calendar_.


**Example 1:**

- **Input:**\
  ["MyCalendarTwo", "book", "book", "book", "book", "book", "book"]\
  [[], [10, 20], [50, 60], [10, 40], [5, 15], [5, 10], [25, 55]]
- **Output:** [null, true, true, true, false, true, true]
- **Explanation:**\
  MyCalendarTwo myCalendarTwo = new MyCalendarTwo();\
  myCalendarTwo.book(10, 20); // return True, The event can be booked.\
  myCalendarTwo.book(50, 60); // return True, The event can be booked.\
  myCalendarTwo.book(10, 40); // return True, The event can be double booked.\
  myCalendarTwo.book(5, 15);  // return False, The event cannot be booked, because it would result in a triple booking.\
  myCalendarTwo.book(5, 10); // return True, The event can be booked, as it does not use time 10 which is already double booked.\
  myCalendarTwo.book(25, 55); // return True, The event can be booked, as the time in [25, 40) will be double booked with the third event, the time [40, 50) will be single booked, and the time [50, 55) will be double booked with the second event.


**Constraints:**

- <code>0 <= start < end <= 10<sup>9</sup></code>
- At most `1000` calls will be made to `book`.


**Hint:**
1. Store two sorted lists of intervals: one list will be all times that are at least single booked, and another list will be all times that are definitely double booked. If none of the double bookings conflict, then the booking will succeed, and you should update your single and double bookings accordingly.



**Solution:**

We need to maintain two lists of bookings:

1. **Single Bookings**: A list that keeps track of all events that are booked once.
2. **Double Bookings**: A list that keeps track of all events that are double booked.

When a new event is requested, we need to check if it will cause a **triple booking**. To do that:

- We first check if the new event overlaps with any of the intervals in the **double bookings** list. If it does, we cannot add the event because it would lead to a triple booking.
- If there is no overlap with the **double bookings**, we then check the **single bookings** list and add the overlap of the new event with existing events to the **double bookings** list.

Finally, if the event passes both checks, we add it to the **single bookings** list.

Let's implement this solution in PHP: **[731. My Calendar II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000731-my-calendar-ii/solution.php)**

```php
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
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
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
 * Your MyCalendarTwo object will be instantiated and called as such:
 * $obj = MyCalendarTwo();
 * $ret_1 = $obj->book($start, $end);
 */
 
 
// Example Usage
$calendar = new MyCalendarTwo();
echo $calendar->book(10, 20) ? 'true' : 'false'; // true
echo "\n";
echo $calendar->book(50, 60) ? 'true' : 'false'; // true
echo "\n";
echo $calendar->book(10, 40) ? 'true' : 'false'; // true
echo "\n";
echo $calendar->book(5, 15) ? 'true' : 'false'; // false
echo "\n";
echo $calendar->book(5, 10) ? 'true' : 'false'; // true
echo "\n";
echo $calendar->book(25, 55) ? 'true' : 'false'; // true
echo "\n";
?>
```

### Explanation:

1. **Constructor (`__construct`)**: Initializes the calendar object with two empty arrays to store the single bookings and double bookings.

2. **Book Function (`book`)**:
   - The function takes the start and end of an event.
   - It first checks if the event overlaps with any interval in the `doubleBookings` list. If it does, the function returns `false` because it would result in a triple booking.
   - If there's no triple booking, it checks the overlap with events in the `singleBookings` list. Any overlap found is added to the `doubleBookings` list, as it now represents a double booking.
   - Finally, the event is added to the `singleBookings` list and the function returns `true`.

### Time Complexity:
- The time complexity is approximately **O(n)** for each booking operation, where `n` is the number of bookings made so far. This is because for each booking, we may need to check all previous bookings in both the `singleBookings` and `doubleBookings` lists.

This solution efficiently handles up to 1000 calls to the `book` function as required by the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**