1306\. Jump Game III

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Depth-First Search`, `Breadth-First Search`, `Weekly Contest 169`

Given an array of non-negative integers `arr`, you are initially positioned at `start` index of the array. When you are at index `i`, you can jump to `i + arr[i]` or `i - arr[i]`, check if you can reach **any** index with value 0.

Notice that you can not jump outside of the array at any time.

**Example 1:**

- **Input:** arr = [4,2,3,0,3,1,2], start = 5
- **Output:** true
- **Explanation:**
  - All possible ways to reach at index 3 with value 0 are:
  - index 5 -> index 4 -> index 1 -> index 3
  - index 5 -> index 6 -> index 4 -> index 1 -> index 3

**Example 2:**

- **Input:** arr = [4,2,3,0,3,1,2], start = 0
- **Output:** true
- **Explanation:**
  - One possible way to reach at index 3 with value 0 is:
  - index 0 -> index 4 -> index 1 -> index 3

**Example 3:**

- **Input:** arr = [3,0,2,1,2], start = 2
- **Output:** false
- **Explanation:** There is no way to reach at index 1 with value 0.

**Constraints:**

- `1 <= arr.length <= 5 * 10⁴`
- `0 <= arr[i] < arr.length`
- `0 <= start < arr.length`



**Hint:**
1. Think of BFS to solve the problem.
2. When you reach a position with a value = 0 then return true.



**Similar Questions:**
1. [45. Jump Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000045-jump-game-ii)
2. [55. Jump Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000055-jump-game)
3. [1871. Jump Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001871-jump-game-vii)
4. [2297. Jump Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002297-jump-game-viii)
5. [2770. Maximum Number of Jumps to Reach the Last Index](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002770-maximum-number-of-jumps-to-reach-the-last-index)






**Solution:**

This solution solves **Jump Game III** using a **BFS (Breadth-First Search)** approach. Starting from the given `start` index, it explores all reachable positions by jumping forward or backward by `arr[i]` steps. It stops early and returns `true` as soon as it finds an index whose value is `0`. If BFS completes without finding a zero, it returns `false`.  
The solution is efficient and avoids revisiting indices, making it suitable for arrays up to 50,000 elements.

### Approach:

- Use **BFS** to systematically explore reachable indices level by level.
- Maintain a `visited` array to prevent revisiting indices and avoid infinite loops.
- Start from the `start` index and push it into a queue.
- While the queue is not empty:
   - Pop the current index `i`.
   - If `arr[i] == 0`, return `true`.
   - Compute `forward = i + arr[i]` and `backward = i - arr[i]`.
   - If `forward` is within bounds and not visited, mark visited and enqueue it.
   - If `backward` is within bounds and not visited, mark visited and enqueue it.
- If BFS finishes, return `false` (no zero reachable).

Let's implement this solution in PHP: **[1306. Jump Game III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001306-jump-game-iii/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @param Integer $start
 * @return Boolean
 */
function canReach(array $arr, int $start): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(canReach([4,2,3,0,3,1,2], 5)) . "\n";           // Output: true
var_dump(canReach([4,2,3,0,3,1,2], 0)) . "\n";           // Output: true
var_dump(canReach([3,0,2,1,2], 2)) . "\n";               // Output: false
?>
```

### Explanation:

- **BFS** guarantees we explore all possible paths without recursion depth issues.
- **Visited array** is crucial to prevent reprocessing indices, which could happen if there are cycles in jumps.
- **Early termination** happens as soon as a zero is found, optimizing performance.
- This method works because each jump is deterministic: from `i` you can only go to `i ± arr[i]`.
- BFS is preferred over DFS here because it naturally finds the shortest path, though for this problem the first zero found is sufficient.

### Complexity
- **Time Complexity**: _**O(n)**_, Each index is visited at most once, and each visit does constant-time work.
- **Space Complexity**: _**O(n)**_, Due to the visited array and queue (which in worst case can hold all indices).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**