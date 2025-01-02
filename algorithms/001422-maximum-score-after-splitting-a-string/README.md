1422\. Maximum Score After Splitting a String

**Difficulty:** Easy

**Topics:** `String`, `Prefix Sum`

Given a string `s` of zeros and ones, return _the maximum score after splitting the string into two **non-empty** substrings_ (i.e. **left** substring and **right** substring).

The score after splitting a string is the number of **zeros** in the **left** substring plus the number of **ones** in the **right** substring.

**Example 1:**

- **Input:** s = "011101"
- **Output:** 5
- **Explanation:** All possible ways of splitting s into two non-empty substrings are:
  left = "0" and right = "11101", score = 1 + 4 = 5
  left = "01" and right = "1101", score = 1 + 3 = 4
  left = "011" and right = "101", score = 1 + 2 = 3
  left = "0111" and right = "01", score = 1 + 1 = 2
  left = "01110" and right = "1", score = 2 + 1 = 3

**Example 2:**

- **Input:** s = "00111"
- **Output:** 5
- **Explanation:** When left = "00" and right = "111", we get the maximum score = 2 + 3 = 5


**Example 3:**

- **Input:** s = "1111"
- **Output:** 3



**Constraints:**

- `2 <= s.length <= 500`
- The string `s` consists of characters `'0'` and `'1'` only.


**Hint:**
1. Precompute a prefix sum of ones ('1').
2. Iterate from left to right counting the number of zeros ('0'), then use the precomputed prefix sum for counting ones ('1'). Update the answer.



**Solution:**

We can leverage the hint provided by precomputing a prefix sum of ones ('1') in the string. Here's how we can break down the solution:

### Steps:
1. **Prefix sum of ones**: Precompute an array where each element at index `i` contains the number of ones ('1') up to index `i` in the string.
2. **Iterate over the string**: For each position `i`, treat the substring from `0` to `i` as the "left" substring and from `i+1` to the end of the string as the "right" substring.
   - Count the zeros in the left substring by simply counting them as you iterate.
   - Use the prefix sum to count the ones in the right substring (by subtracting the prefix sum at the split point from the total count of ones in the string).
3. **Compute the score**: For each possible split, compute the score as the number of zeros in the left substring plus the number of ones in the right substring.
4. **Return the maximum score**.

Let's implement this solution in PHP: **[1422. Maximum Score After Splitting a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001422-maximum-score-after-splitting-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maxScore($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$s1 = "011101";
$s2 = "00111";
$s3 = "1111";

echo "Input: $s1, Output: " . maxScore($s1) . PHP_EOL; // Output: 5
echo "Input: $s2, Output: " . maxScore($s2) . PHP_EOL; // Output: 5
echo "Input: $s3, Output: " . maxScore($s3) . PHP_EOL; // Output: 3
?>
```

### Explanation:

1. **Prefix sum computation**: We compute the prefix sum of ones in the array `$prefixOneCount`, where each index holds the cumulative count of ones up to that point.

2. **Iterating over possible splits**: We start iterating through each index `i` (from 0 to `n-2`), where the string is split into a left part (from 0 to `i`) and a right part (from `i+1` to `n-1`).
   - For each split, count the zeros in the left substring (`$zeroCountLeft`).
   - Use the precomputed `$prefixOneCount` to calculate how many ones are in the right substring.

3. **Score calculation**: The score for each split is calculated as the sum of zeros in the left part and ones in the right part. We update the maximum score encountered during this iteration.

4. **Final result**: The function returns the maximum score found during all splits.

### Complexity:

- **Time Complexity**: _**O(n)**_
   - Precomputing prefix sums and iterating through the string both take _**O(n)**_.
   - Iterating through the string to compute scores also takes O(n).
     Thus, the total time complexity is O(n), which is efficient for the given input size (`n ≤ 500`).

- **Space Complexity**: _**O(n)**_
   - The prefix sum array requires _**O(n)**_ additional space.

### Example:

```php
echo maxScore("011101"); // Output: 5
echo maxScore("00111");  // Output: 5
echo maxScore("1111");   // Output: 3
```

This solution is optimal and handles the problem within the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
