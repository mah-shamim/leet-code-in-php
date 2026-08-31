2058\. Find the Minimum and Maximum Number of Nodes Between Critical Points

**Difficulty:** Medium

**Topics:** `Senior`, `Linked List`, `Weekly Contest 265`

A **critical point** in a linked list is defined as **either** a **local maxima** or a **local minima**.

A node is a **local maxima** if the current node has a value **strictly greater** than the previous node and the next node.

A node is a **local minima** if the current node has a value **strictly smaller** than the previous node and the next node.

Note that a node can only be a local maxima/minima if there exists **both** a previous node and a next node.

Given a linked list `head`, return _an array of length 2 containing `[minDistance, maxDistance]` where `minDistance` is the **minimum distance** between **any two distinct** critical points and `maxDistance` is the **maximum distance** between **any two distinct** critical points. If there are **fewer** than two critical points, return `[-1, -1]`_.

**Example 1:**

![a1](https://assets.leetcode.com/uploads/2021/10/13/a1.png)

- **Input:** head = [3,1]
- **Output:** [-1,-1]
- **Explanation:** There are no critical points in [3,1].

**Example 2:**

![a2](https://assets.leetcode.com/uploads/2021/10/13/a2.png)

- **Input:** head = [5,3,1,2,5,1,2]
- **Output:** [1,3]
- **Explanation:** There are three critical points:
  - [5,3,<ins>**1**</ins>,2,5,1,2]: The third node is a local minima because 1 is less than 3 and 2.
  - [5,3,1,2,<ins>**5**</ins>,1,2]: The fifth node is a local maxima because 5 is greater than 2 and 1.
  - [5,3,1,2,5,<ins>**1**</ins>,2]: The sixth node is a local minima because 1 is less than 5 and 2.
  - The minimum distance is between the fifth and the sixth node. minDistance = 6 - 5 = 1.
  - The maximum distance is between the third and the sixth node. maxDistance = 6 - 3 = 3.

**Example 3:**

![a5](https://assets.leetcode.com/uploads/2021/10/14/a5.png)

- **Input:** head = [1,3,2,2,3,2,2,2,7]
- **Output:** [3,3]
- **Explanation:** There are two critical points:
  - [1,<ins>**3**</ins>,2,2,3,2,2,2,7]: The second node is a local maxima because 3 is greater than 1 and 2.
  - [1,3,2,2,<ins>**3**</ins>,2,2,2,7]: The fifth node is a local maxima because 3 is greater than 2 and 2.
  - Both the minimum and maximum distances are between the second and the fifth node.
  - Thus, minDistance and maxDistance is 5 - 2 = 3.
  - Note that the last node is not considered a local maxima because it does not have a next node.

**Example 4:**

- **Input:** head = [2,1,3,1,2]
- **Output:** [1,3]

**Example 5:**

- **Input:** head = [1,2,3,4,5]
- **Output:** [-1,-1]

**Example 6:**

- **Input:** head = [5,4,3,2,1]
- **Output:** [-1,-1]

**Example 7:**

- **Input:** head = [1,2,3,2,1,2,3,2,1]
- **Output:** [1,6]

**Example 8:**

- **Input:** head = [1,2,1,2,1,2,1]
- **Output:** [2,4]

**Constraints:**


 - The number of nodes in the list is in the range <code>[2, 10<sup>5</sup>]</code>.
 - <code>1 <= Node.val <= 10<sup>5</sup></code>

**Hint:**
1. The maximum distance must be the distance between the first and last critical point.
2. For each adjacent critical point, calculate the difference and check if it is the minimum distance.

**Solution:**

We solve this problem by traversing the linked list once, identifying all critical points (local maxima and minima), and tracking their positions. We maintain the first critical point position, the previous critical point position, and calculate the minimum distance between adjacent critical points. The maximum distance is simply the difference between the first and last critical points.

## Approach

- **Single Pass Traversal**: Iterate through the linked list while maintaining three pointers: previous, current, and next nodes to evaluate each position
- **Critical Point Detection**: For each node (except first and last), check if it's a local maxima (greater than both neighbors) or local minima (smaller than both neighbors)
- **Track Positions**: Keep track of:
  - First critical point index
  - Previous critical point index (for calculating minimum distance)
  - Current index while traversing
- **Distance Calculation**:
  - When a new critical point is found, calculate distance from previous critical point and update minimum distance
  - Maximum distance is calculated at the end as the difference between last and first critical points
- **Edge Case Handling**: Return [-1, -1] if fewer than 2 critical points are found

Let's implement this solution in PHP: **[2058. Find the Minimum and Maximum Number of Nodes Between Critical Points](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002058-find-the-minimum-and-maximum-number-of-nodes-between-critical-points/solution.php)**

```php
<?php
/**
 * @param Integer[] $c
 * @param Integer[][] $connections
 * @param Integer[][] $queries
 * @return Integer[]
 */
function nodesBetweenCriticalPoints($c, $connections, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo nodesBetweenCriticalPoints([3,1]) .  "\n";                     // Output: [-1,-1]
echo nodesBetweenCriticalPoints([5,3,1,2,5,1,2]) .  "\n";           // Output: [1,3]
echo nodesBetweenCriticalPoints([1,3,2,2,3,2,2,2,7]) .  "\n";       // Output: [3,3]
echo nodesBetweenCriticalPoints([2,1,3,1,2]) .  "\n";               // Output: [1,3]
echo nodesBetweenCriticalPoints([1,2,3,4,5]) .  "\n";               // Output: [-1,-1]
echo nodesBetweenCriticalPoints([5,4,3,2,1]) .  "\n";               // Output: [-1,-1]
echo nodesBetweenCriticalPoints([1,2,3,2,1,2,3,2,1]) .  "\n";       // Output: [1,6]
echo nodesBetweenCriticalPoints([1,2,1,2,1,2,1]) .  "\n";           // Output: [2,4]
?>
```

### Explanation:

- **Initialization**: We start with `$result = [-1, -1]` and set `$minDistance = PHP_INT_MAX` to track the minimum distance between critical points
- **Three-Pointer Technique**: Using `$previousNode`, `$currentNode`, and `$currentNode->next` allows us to check if the current node satisfies the critical point conditions
- **Critical Point Detection**:
  - Local minima: `$currentNode->val < $previousNode->val && $currentNode->val < $currentNode->next->val`
  - Local maxima: `$currentNode->val > $previousNode->val && $currentNode->val > $currentNode->next->val`
- **Index Tracking**: `$currentIndex` starts at 1 (since head is at position 0) and increments with each node traversal
- **First Critical Point**: When the first critical point is found, we set both `$firstCriticalIndex` and `$previousCriticalIndex` to the current index
- **Subsequent Critical Points**: For each new critical point, we calculate the distance from the previous critical point and update `$minDistance`, then update `$previousCriticalIndex`
- **Final Computation**: If at least two critical points exist (`$minDistance != PHP_INT_MAX`), we compute:
  - `$maxDistance = $previousCriticalIndex - $firstCriticalIndex` (distance between first and last critical points)
  - Return `[$minDistance, $maxDistance]`

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ where n is the number of nodes in the linked list
  - We traverse the list exactly once, performing constant-time operations at each node
  - No additional passes or nested loops are required

- **Space Complexity**: _**O(1)**_
  - We only use a few variables to track indices and distances
  - No extra data structures are used that scale with input size

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**