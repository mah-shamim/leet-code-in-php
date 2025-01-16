2554\. Maximum Number of Integers to Choose From a Range I

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Binary Search`, `Greedy`, `Sorting`

You are given an integer array `banned` and two integers `n` and `maxSum`. You are choosing some number of integers following the below rules:

- The chosen integers have to be in the range `[1, n]`.
- Each integer can be chosen **at most once**.
- The chosen integers should not be in the array `banned`.
- The sum of the chosen integers should not exceed `maxSum`.

Return _the **maximum** number of integers you can choose following the mentioned rules_.

**Example 1:**

- **Input:** banned = [1,6,5], n = 5, maxSum = 6
- **Output:** 2
- **Explanation:** You can choose the integers 2 and 4.
  2 and 4 are from the range [1, 5], both did not appear in banned, and their sum is 6, which did not exceed maxSum.

**Example 2:**

- **Input:** banned = [1,2,3,4,5,6,7], n = 8, maxSum = 1
- **Output:** 0
- **Explanation:** You cannot choose any integer while following the mentioned conditions.


**Example 3:**

- **Input:** banned = [11], n = 7, maxSum = 50
- **Output:** 7
- **Explanation:** You can choose the integers 1, 2, 3, 4, 5, 6, and 7.
  They are from the range [1, 7], all did not appear in banned, and their sum is 28, which did not exceed maxSum.



**Constraints:**

- <code>1 <= banned.length <= 10<sup>4</sup></code>
- <code>1 <= banned[i], n <= 10<sup>4</sup></code>
- <code>1 <= maxSum <= 10<sup>9</sup></code>


**Hint:**
1. Keep the banned numbers that are less than n in a set.
2. Loop over the numbers from 1 to n and if the number is not banned, use it.
3. Keep adding numbers while they are not banned, and their sum is less than k.



**Solution:**

We can use a greedy approach where we iterate over the numbers from `1` to `n`, skipping the banned numbers, and keep adding the valid numbers (those not in the `banned` array) to a running sum until we reach the `maxSum`.

Here's the step-by-step solution:

### Steps:
1. **Convert banned array to a set for quick lookups:** Using `array_flip()` can convert the `banned` array into a set for O(1) average-time complexity lookups.
2. **Iterate from 1 to n:** Check each number, if it's not in the banned set and if adding it doesn't exceed `maxSum`, add it to the sum and increase the count.
3. **Stop once adding the next number exceeds `maxSum`:** Since the goal is to maximize the number of chosen integers without exceeding the sum, this greedy approach ensures we take the smallest available numbers first.

### Approach:
1. **Exclude Banned Numbers:** We'll keep track of the banned numbers in a set (or an associative array) for fast lookups.
2. **Greedy Selection:** Start selecting numbers from `1` to `n` in ascending order, as this will allow us to maximize the number of integers selected. Each time we select a number, we'll add it to the sum and check if it exceeds `maxSum`. If it does, stop.
3. **Efficiency Considerations:** Since we are iterating over numbers from `1` to `n`, and checking if each is in the banned set (which can be done in constant time), the approach runs in linear time relative to `n` and the size of the banned list.

Let's implement this solution in PHP: **[2554. Maximum Number of Integers to Choose From a Range I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002554-maximum-number-of-integers-to-choose-from-a-range-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $banned
 * @param Integer $n
 * @param Integer $maxSum
 * @return Integer
 */
function maxCount($banned, $n, $maxSum) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxCount([1, 6, 5], 5, 6);  // Output: 2
echo "\n";
echo maxCount([1, 2, 3, 4, 5, 6, 7], 8, 1);  // Output: 0
echo "\n";
echo maxCount([11], 7, 50);  // Output: 7
?>
```

### Explanation:

1. **Convert banned array to set:**  
   We use `array_flip($banned)` to create a set from the `banned` array, which allows for O(1) lookups to check if a number is banned.

2. **Iterate from `1` to `n`:**  
   We iterate through numbers from `1` to `n`. For each number:
   - If the number is not in the banned set (checked using `isset($bannedSet[$i])`),
   - And if adding the number to the sum does not exceed `maxSum`,
   - We include that number and update the sum and count.

3. **Return the count:**  
   After the loop, we return the number of integers selected (`$count`).
4. **`$bannedSet = array_flip($banned);`**: This converts the banned list into a set (associative array) for fast lookups.
5. **`for ($i = 1; $i <= $n; $i++)`**: We iterate over all integers from 1 to `n`.
6. **`if (isset($bannedSet[$i])) { continue; }`**: This checks if the current number is in the banned set. If it is, we skip it.
7. **`if ($sum + $i > $maxSum) { break; }`**: If adding the current number exceeds `maxSum`, we stop the process.
8. **`$sum += $i; $count++;`**: If the number is valid and adding it doesn't exceed `maxSum`, we include it in our sum and increase the count.

### Time Complexity:
- The creation of the banned set (`array_flip`) is O(b), where `b` is the length of the banned array.
- The loop iterates `n` times (for numbers from 1 to `n`), and each lookup into the banned set takes O(1) time. So, the time complexity of the loop is O(n).
- Thus, the overall time complexity is O(n + b), which is efficient given the problem constraints.

### Example Walkthrough:

For the input:

- **Input 1:** `banned = [1, 6, 5], n = 5, maxSum = 6`
   - We create the banned set: `{1, 5, 6}`.
   - We iterate through numbers 1 to 5:
      - 1 is banned, skip it.
      - 2 is not banned, add it to sum (`sum = 2`, `count = 1`).
      - 3 is not banned, add it to sum (`sum = 5`, `count = 2`).
      - 4 is not banned, but adding it to the sum would exceed `maxSum` (5 + 4 = 9), so skip it.
   - The result is 2.

- **Input 2:** `banned = [1, 2, 3, 4, 5, 6, 7], n = 8, maxSum = 1`
   - All numbers from 1 to 7 are banned, so no valid numbers can be chosen.
   - The result is 0.

- **Input 3:** `banned = [11], n = 7, maxSum = 50`
   - The only banned number is 11, which is outside the range 1 to 7.
   - We can select all numbers from 1 to 7, and their sum is 28, which is less than `maxSum`.
   - The result is 7.

This solution efficiently handles the problem within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
