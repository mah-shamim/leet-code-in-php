1298\. Maximum Candies You Can Get from Boxes

**Difficulty:** Hard

**Topics:** `Array`, `Breadth-First Search`, `Graph`

You have `n` boxes labeled from `0` to `n - 1`. You are given four arrays: `status`, `candies`, `keys`, and `containedBoxes` where:

- `status[i]` is `1` if the <code>i<sup>th</sup></code> box is open and `0` if the <code>i<sup>th</sup></code> box is closed,
- `candies[i]` is the number of candies in the <code>i<sup>th</sup></code> box,
- `keys[i]` is a list of the labels of the boxes you can open after opening the <code>i<sup>th</sup></code> box.
- `containedBoxes[i]` is a list of the boxes you found inside the <code>i<sup>th</sup></code> box.

You are given an integer array `initialBoxes` that contains the labels of the boxes you initially have. You can take all the candies in **any open box** and you can use the keys in it to open new boxes and you also can use the boxes you find in it.

Return _the maximum number of candies you can get following the rules above_.

**Example 1:**

- **Input:** status = [1,0,1,0], candies = [7,5,4,100], keys = [[],[],[1],[]], containedBoxes = [[1,2],[3],[],[]], initialBoxes = [0]
- **Output:** 16
- **Explanation:** You will be initially given box 0. You will find 7 candies in it and boxes 1 and 2.
  Box 1 is closed and you do not have a key for it so you will open box 2. You will find 4 candies and a key to box 1 in box 2.
  In box 1, you will find 5 candies and box 3 but you will not find a key to box 3 so box 3 will remain closed.
  Total number of candies collected = 7 + 4 + 5 = 16 candy.

**Example 2:**

- **Input:** status = [1,0,0,0,0,0], candies = [1,1,1,1,1,1], keys = [[1,2,3,4,5],[],[],[],[],[]], containedBoxes = [[1,2,3,4,5],[],[],[],[],[]], initialBoxes = [0]
- **Output:** 6
- **Explanation:** You have initially box 0. Opening it you can find boxes 1,2,3,4 and 5 and their keys.
  The total number of candies will be 6.



**Constraints:**

- `n == status.length == candies.length == keys.length == containedBoxes.length`
- `1 <= n <= 1000`
- `status[i]` is either `0` or `1`.
- `1 <= candies[i] <= 1000`
- `0 <= keys[i].length <= n`
- `0 <= keys[i][j] < n`
- All values of `keys[i]` are **unique**.
- `0 <= containedBoxes[i].length <= n`
- `0 <= containedBoxes[i][j] < n`
- All values of `containedBoxes[i]` are unique.
- Each box is contained in one box at most.
- `0 <= initialBoxes.length <= n`
- `0 <= initialBoxes[i] < n`


**Hint:**
1. Use Breadth First Search (BFS) to traverse all possible boxes you can open. Only push to the queue the boxes the you have with their keys.



**Solution:**

We need to determine the maximum number of candies we can collect by opening boxes according to specific rules. The boxes can be opened if they are initially open or if we have the corresponding key. When a box is opened, we collect its candies, obtain any keys inside it, and gain access to any boxes contained within it. The challenge is to efficiently traverse all possible boxes we can open starting from the initial set of boxes, considering dependencies between keys and boxes.

### Approach
1. **Initialization**: We maintain three arrays to track:
    - `hasBox`: Indicates which boxes we currently possess.
    - `hasKey`: Indicates which keys we have obtained.
    - `visited`: Marks boxes that have been processed (opened and their contents collected).

2. **Initial Setup**: Start by marking all initial boxes as possessed. For each initial box, if it is open (status is 1) or we already have its key (though initially, we don't), we add it to a queue for processing.

3. **Processing Queue**: Using a BFS approach:
    - **Dequeue a box**: Collect its candies.
    - **Process keys found in the box**: For each key found, mark that we have it. If the corresponding box is possessed and not yet processed, add it to the queue.
    - **Process contained boxes**: For each box found inside, mark it as possessed. If this box is open or we have its key, and it hasn't been processed, add it to the queue.

4. **Termination**: The BFS continues until no more boxes can be opened. The total candies collected during this process are returned.

Let's implement this solution in PHP: **[1298. Maximum Candies You Can Get from Boxes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001298-maximum-candies-you-can-get-from-boxes/solution.php)**

```php
<?php
/**
 * @param Integer[] $status
 * @param Integer[] $candies
 * @param Integer[][] $keys
 * @param Integer[][] $containedBoxes
 * @param Integer[] $initialBoxes
 * @return Integer
 */
function maxCandies($status, $candies, $keys, $containedBoxes, $initialBoxes) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$status = [1,0,1,0];
$candies = [7,5,4,100];
$keys = [[],[],[1],[]];
$containedBoxes = [[1,2],[3],[],[]];
$initialBoxes = [0];
echo maxCandies($status, $candies, $keys, $containedBoxes, $initialBoxes) . "\n"; // Output: 16

// Example 2
$status = [1,0,0,0,0,0];
$candies = [1,1,1,1,1,1];
$keys = [[1,2,3,4,5],[],[],[],[],[]];
$containedBoxes = [[1,2,3,4,5],[],[],[],[],[]];
$initialBoxes = [0];
echo maxCandies($status, $candies, $keys, $containedBoxes, $initialBoxes) . "\n"; // Output: 6
?>
```

### Explanation:

1. **Initialization**: Arrays `hasBox`, `hasKey`, and `visited` are initialized to keep track of possessed boxes, obtained keys, and processed boxes, respectively.
2. **Initial Processing**: For each initial box, mark it as possessed. If the box is open or we have its key, add it to the queue for processing.
3. **BFS Processing**:
    - **Candy Collection**: For each box dequeued, add its candies to the total.
    - **Key Handling**: For each key found in the box, mark it as obtained. If the corresponding box is possessed and not processed, enqueue it.
    - **Contained Boxes Handling**: For each box found inside the current box, mark it as possessed. If this box is open or we have its key, and it hasn't been processed, enqueue it.
4. **Termination**: The loop exits when no more boxes can be opened. The total candies collected are returned.

This approach efficiently processes all accessible boxes by leveraging BFS to handle dependencies between keys and boxes dynamically, ensuring maximum candy collection.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**