2515\. Shortest Distance to Target String in a Circular Array

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `String`, `Weekly Contest 325`

You are given a **0-indexed circular** string array `words` and a string `target`. A **circular array** means that the array's end connects to the array's beginning.

- Formally, the next element of `words[i]` is `words[(i + 1) % n]` and the previous element of `words[i]` is `words[(i - 1 + n) % n]`, where `n` is the length of `words`.

Starting from `startIndex`, you can move to either the next word or the previous word with `1` step at a time.

Return _the **shortest** distance needed to reach the string `target`_. If the string `target` does not exist in `words`, return `-1`.

**Example 1:**

- **Input:** words = ["hello","i","am","leetcode","hello"], target = "hello", startIndex = 1
- **Output:** 1
- **Explanation:** 
  - We start from index 1 and can reach "hello" by
    - moving 3 units to the right to reach index 4.
    - moving 2 units to the left to reach index 4.
    - moving 4 units to the right to reach index 0.
    - moving 1 unit to the left to reach index 0.
  - The shortest distance to reach "hello" is 1.

**Example 2:**

- **Input:** words = ["a","b","leetcode"], target = "leetcode", startIndex = 0
- **Output:** 1
- **Explanation:** 
  - We start from index 0 and can reach "leetcode" by
    - moving 2 units to the right to reach index 2.
    - moving 1 unit to the left to reach index 2.
  - The shortest distance to reach "leetcode" is 1.

**Example 3:**

- **Input:** words = ["cat","dog","bird"], target = "fish", startIndex = 1
- **Output:** -1

**Constraints:**

- `1 <= words.length <= 100`
- `1 <= words[i].length <= 100`
- `words[i]` and `target` consist of only lowercase English letters.
- `0 <= startIndex < words.length`



**Hint:**
1. You have two options, either move straight to the left or move straight to the right.
2. Find the first target word and record the distance.
3. Choose the one with the minimum distance.



**Similar Questions:**
1. [1652. Defuse the Bomb](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001652-defuse-the-bomb)






**Solution:**

This solution finds the minimum steps needed to reach a target string in a circular array starting from a given index. It calculates both clockwise and counterclockwise distances to each occurrence of the target and returns the smallest distance, or -1 if the target doesn't exist.

### Approach:

- **Circular Distance Calculation**: Use modulo arithmetic to compute distances in both directions around the circular array
- **Target Location**: Iterate through all indices to find positions where `words[i]` equals the target
- **Distance Comparison**: For each target occurrence, calculate both forward and backward distances and take the minimum
- **Global Minimum**: Track the smallest distance across all target occurrences
- **Edge Case Handling**: Return -1 if no target found

Let's implement this solution in PHP: **[2515. Shortest Distance to Target String in a Circular Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002515-shortest-distance-to-target-string-in-a-circular-array/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param String $target
 * @param Integer $startIndex
 * @return Integer
 */
function closestTarget(array $words, string $target, int $startIndex): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo closestTarget(["hello","i","am","leetcode","hello"], "hello", 1) . "\n";           // Output: 1
echo closestTarget(["a","b","leetcode"], "leetcode", 0) . "\n";                         // Output: 1
echo closestTarget(["cat","dog","bird"], "fish", 1) . "\n";                             // Output: -1
?>
```

### Explanation:

- **Forward Distance Calculation**: `($i - $startIndex + $n) % $n` computes steps needed moving right (clockwise) from start to target index i
- **Backward Distance Calculation**: `($startIndex - $i + $n) % $n` computes steps needed moving left (counterclockwise) from start to target index i
- **Minimum per Occurrence**: `min($forward, $backward)` gives the shortest path to that specific target occurrence
- **Global Optimization**: Track the overall minimum distance across all target positions in the array
- **No Target Found**: If `$minDistance` remains `PHP_INT_MAX`, the target doesn't exist, so return -1

### Complexity
- **Time Complexity**: _**O(n)**_ where n is the length of the words array - single pass to check all indices
- **Space Complexity**: _**O(1)**_ - only uses a few variables regardless of input size

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**