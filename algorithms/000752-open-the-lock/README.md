752\. Open the Lock

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Breadth-First Search`

You have a lock in front of you with 4 circular wheels. Each wheel has 10 slots: `'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'`. The wheels can rotate freely and wrap around: for example we can turn `'9'` to be `'0'`, or `'0'` to be `'9'`. Each move consists of turning one wheel one slot.

The lock initially starts at `'0000'`, a string representing the state of the 4 wheels.

You are given a list of `deadends` dead ends, meaning if the lock displays any of these codes, the wheels of the lock will stop turning and you will be unable to open it.

Given a `target` representing the value of the wheels that will unlock the lock, return the minimum total number of turns required to open the lock, or -1 if it is impossible.



**Example 1:**

**Input:** deadends = ["0201","0101","0102","1212","2002"], target = "0202"
**Output:** 6
**Explanation:** 

    A sequence of valid moves would be "0000" -> "1000" -> "1100" -> "1200" -> "1201" -> "1202" -> "0202".
    Note that a sequence like "0000" -> "0001" -> "0002" -> "0102" -> "0202" would be invalid,
    because the wheels of the lock become stuck after the display becomes the dead end "0102".

**Example 2:**

**Input:** deadends = ["8888"], target = "0009"
**Output:** 1
**Explanation:** We can turn the last wheel in reverse to move from "0000" -> "0009".

**Example 3:**

**Input:** deadends = ["8887","8889","8878","8898","8788","8988","7888","9888"], target = "8888"
**Output:** -1
**Explanation:** We cannot reach the target without getting stuck.

**Constraints:**

- <code>1 <= deadends.length <= 500</code>
- <code>deadends[i].length == 4</code>
- <code>target.length == 4</code>
- target **will not be** in the list `deadends`.
- `target` and `deadends[i]` consist of digits only.


**Hint:**
1. We can think of this problem as a shortest path problem on a graph: there are `10000` nodes (strings `'0000'` to `'9999'`), and there is an edge between two nodes if they differ in one digit, that digit differs by 1 (wrapping around, so `'0'` and `'9'` differ by 1), and if *both* nodes are not in `deadends`.



**Solution:**

We can use **Breadth-First Search (BFS)** to find the shortest path from the initial state `'0000'` to the `target` while avoiding the deadends.

### Key Concepts:
1. **Graph Representation**:
    - Each lock state (e.g., `'0000'`, `'1234'`) is a node.
    - Each move consists of changing one wheel either forward (increment by 1) or backward (decrement by 1). This gives a total of 8 possible moves from any given state (2 for each of the 4 wheels).

2. **BFS Approach**:
    - We start at the initial state `'0000'` and try all possible moves.
    - If a state matches a deadend or has been visited before, we skip it.
    - Once we reach the `target`, we return the number of moves (the depth of BFS).
    - If we explore all possibilities and don't reach the target, we return `-1` (the lock is impossible to open).

### Steps:
1. Initialize a queue for BFS starting with `'0000'`.
2. Maintain a set of `deadends` for quick lookup.
3. Keep track of visited states to avoid revisiting them.
4. At each step, generate all possible next states by incrementing or decrementing each wheel.
5. If the `target` is reached, return the number of moves (the BFS level).

Let's implement this solution in PHP: **[752. Open the Lock](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000752-open-the-lock/solution.php)**

```php
<?php
/**
 * @param String[] $deadends
 * @param String $target
 * @return Integer
 */
function openLock($deadends, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to get the next possible states
 *
 * @param $current
 * @return array
 */
function getNextStates($current) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo openLock(["0201","0101","0102","1212","2002"], "0202") . "\n";  // Output: 6
echo openLock(["8888"], "0009") . "\n";                              // Output: 1
echo openLock(["8887","8889","8878","8898","8788","8988","7888","9888"], "8888") . "\n";  // Output: -1
?>
```

### Explanation:

1. **Deadends Check**:
    - Before we start the BFS, we check if the initial state `'0000'` is a deadend. If it is, we immediately return `-1` since we can't make any moves.

2. **BFS Algorithm**:
    - We start with `'0000'` at depth `0` (no moves made yet).
    - For each state, we generate all possible next states by rotating each wheel either forward or backward (using the helper function `getNextStates()`).
    - If a state is not in the deadends and hasn't been visited yet, we mark it as visited and add it to the queue with an incremented move count.

3. **Return the Result**:
    - If we reach the `target` state during the BFS traversal, we return the number of moves taken.
    - If we exhaust all possibilities and never reach the target, we return `-1`.

### Time Complexity:
- **Time Complexity**: O(10^4) = O(1), because the total number of possible states is fixed at 10,000 (`0000` to `9999`). BFS explores each state at most once.
- **Space Complexity**: O(10^4) for storing visited states and the queue.

### Example Walkthrough:

- For input `deadends = ["0201","0101","0102","1212","2002"]` and `target = "0202"`, BFS starts at `'0000'`, and after 6 valid moves, we can reach the target `'0202'`. Thus, the output is `6`.

- For `deadends = ["8888"]` and `target = "0009"`, we can reach the target with just 1 move by rotating the last wheel of `'0000'` backward to `'0009'`. Hence, the output is `1`.

- For `deadends = ["8887","8889","8878","8898","8788","8988","7888","9888"]` and `target = "8888"`, all paths to the target are blocked, so the output is `-1`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**