3508\. Implement Router

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Binary Search`, `Design`, `Queue`, `Ordered Set`, `Weekly Contest 444`

Design a data structure that can efficiently manage data packets in a network router. Each data packet consists of the following attributes:

- `source`: A unique identifier for the machine that generated the packet.
- `destination`: A unique identifier for the target machine.
- `timestamp`: The time at which the packet arrived at the router.

Implement the `Router` class:

`Router(int memoryLimit)`: Initializes the Router object with a fixed memory limit.

- `memoryLimit` is the **maximum** number of packets the router can store at any given time.
- If adding a new packet would exceed this limit, the **oldest** packet must be removed to free up space.

`bool addPacket(int source, int destination, int timestamp)`: Adds a packet with the given attributes to the router.

- A packet is considered a duplicate if another packet with the same `source`, `destination`, and `timestamp` already exists in the router.
- Return `true` if the packet is successfully added (i.e., it is not a duplicate); otherwise return `false`.

`int[] forwardPacket()`: Forwards the next packet in FIFO (First In First Out) order.

- Remove the packet from storage.
- Return the packet as an array `[source, destination, timestamp]`.
- If there are no packets to forward, return an empty array.

`int getCount(int destination, int startTime, int endTime)`:

- Returns the number of packets currently stored in the router (i.e., not yet forwarded) that have the specified destination and have timestamps in the inclusive range `[startTime, endTime]`.

**Note** that queries for `addPacket` will be made in increasing order of `timestamp`.

**Example 1:**

- **Input:**
  ["Router", "addPacket", "addPacket", "addPacket", "addPacket", "addPacket", "forwardPacket", "addPacket", "getCount"]
  [[3], [1, 4, 90], [2, 5, 90], [1, 4, 90], [3, 5, 95], [4, 5, 105], [], [5, 2, 110], [5, 100, 110]]
- **Output:** [null, true, true, false, true, true, [2, 5, 90], true, 1]
- **Explanation:** 
  Router router = new Router(3); // Initialize Router with memoryLimit of 3.
  router.addPacket(1, 4, 90); // Packet is added. Return True.
  router.addPacket(2, 5, 90); // Packet is added. Return True.
  router.addPacket(1, 4, 90); // This is a duplicate packet. Return False.
  router.addPacket(3, 5, 95); // Packet is added. Return True
  router.addPacket(4, 5, 105); // Packet is added, `[1, 4, 90]` is removed as number of packets exceeds memoryLimit. Return True.
  router.forwardPacket(); // Return `[2, 5, 90]` and remove it from router.
  router.addPacket(5, 2, 110); // Packet is added. Return True.
  router.getCount(5, 100, 110); // The only packet with destination 5 and timestamp in the inclusive range `[100, 110]` is `[4, 5, 105]`. Return 1.

**Constraints:**

- <code>2 <= memoryLimit <= 10<sup>5</sup></code>
- <code>1 <= source, destination <= 2 * 10<sup>5</sup></code>
- <code>1 <= timestamp <= 10<sup>9</sup></code>
- <code>1 <= startTime <= endTime <= 10<sup>9</sup></code>
- At most <code>10<sup>5</sup></code> calls will be made to `addPacket`, `forwardPacket`, and `getCount` methods altogether.
- queries for `addPacket` will be made in increasing order of `timestamp`.



**Hint:**
1. A deque can simulate the adding and forwarding of packets efficiently.
2. Use binary search for counting packets within a timestamp range.






**Solution:**

We are going to design a Router class with the following:

### Approach:

1. **Initialization**: The Router class is initialized with a memory limit, a queue to manage packets in FIFO order, a set to check for duplicates, and a dictionary to store timestamps of packets grouped by destination.
2. **Adding Packets**: When adding a packet, check for duplicates using a composite key of source, destination, and timestamp. If the memory is full, remove the oldest packet from the queue and update the dictionary. Add the new packet to the queue, set, and dictionary.
3. **Forwarding Packets**: Remove the oldest packet from the queue and return it. Update the set and dictionary accordingly.
4. **Counting Packets**: For a given destination and time range, use binary search on the sorted list of timestamps (for that destination) to count packets within the range.

Let's implement this solution in PHP: **[3508. Implement Router](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003508-implement-router/solution.php)**

```php
<?php
class Router {
    private $memoryLimit;
    private $queue;
    private $set;
    private $byDestination;

    /**
     * @param Integer $memoryLimit
     */
    function __construct($memoryLimit) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $source
     * @param Integer $destination
     * @param Integer $timestamp
     * @return Boolean
     */
    function addPacket($source, $destination, $timestamp) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @return Integer[]
     */
    function forwardPacket() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $destination
     * @param Integer $startTime
     * @param Integer $endTime
     * @return Integer
     */
    function getCount($destination, $startTime, $endTime) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @return void
     */
    private function removeOldestPacket() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $arr
     * @param $value
     * @return int
     */
    private function binarySearchFirst($arr, $value) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $arr
     * @param $startTime
     * @return int
     */
    private function findFirstIndex($arr, $startTime) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $arr
     * @param $endTime
     * @param $startIndex
     * @return int
     */
    private function findLastIndex($arr, $endTime, $startIndex) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * Your Router object will be instantiated and called as such:
 * $obj = Router($memoryLimit);
 * $ret_1 = $obj->addPacket($source, $destination, $timestamp);
 * $ret_2 = $obj->forwardPacket();
 * $ret_3 = $obj->getCount($destination, $startTime, $endTime);
 */

// Test cases
$router = new Router(3);
var_dump($router->addPacket(1,4,90));   // true
var_dump($router->addPacket(2,5,90));   // true
var_dump($router->addPacket(1,4,90));   // false (duplicate)
var_dump($router->addPacket(3,5,95));   // true
var_dump($router->addPacket(4,5,105));  // true, evicts [1,4,90]
print_r($router->forwardPacket());      // [2,5,90]
var_dump($router->addPacket(5,2,110));  // true
echo $router->getCount(5,100,110);      // 1
?>
```

### Explanation:

- **Memory Management**: The router uses a queue to manage packets in FIFO order. When the memory limit is exceeded, the oldest packet is removed before adding a new one.
- **Duplicate Check**: A set stores composite keys of packets to quickly check for duplicates.
- **Efficient Counting**: For each destination, timestamps are stored in a sorted list (since packets are added in increasing timestamp order). Binary search is used to efficiently count packets within a time range.
- **Removal Handling**: When packets are removed (either due to memory limits or forwarding), they are removed from the queue, set, and the corresponding destination's timestamp list.

This approach ensures that all operations are efficient, with average time complexities that handle the constraints effectively.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**