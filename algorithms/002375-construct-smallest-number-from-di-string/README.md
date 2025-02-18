2375\. Construct Smallest Number From DI String

**Difficulty:** Medium

**Topics:** `String`, `Backtracking`, `Stack`, `Greedy`

You are given a **0-indexed** string `pattern` of length n consisting of the characters `'I'` meaning increasing and `'D'` meaning **decreasing**.

A **0-indexed** string `num` of length `n + 1` is created using the following conditions:

- `num` consists of the digits `'1'` to `'9'`, where each digit is used at most once.
- If `pattern[i] == 'I'`, then `num[i] < num[i + 1]`.
- If `pattern[i] == 'D'`, then `num[i] > num[i + 1]`.

Return _the lexicographically **smallest** possible string `num` that meets the conditions_.

**Example 1:**

- **Input:** pattern = "IIIDIDDD"
- **Output:** "123549876"
- **Explanation:**
  At indices 0, 1, 2, and 4 we must have that num[i] < num[i+1].
  At indices 3, 5, 6, and 7 we must have that num[i] > num[i+1].
  Some possible values of num are "245639871", "135749862", and "123849765".
  It can be proven that "123549876" is the smallest possible num that meets the conditions.
  Note that "123414321" is not possible because the digit '1' is used more than once.

**Example 2:**

- **Input:** pattern = "DDD"
- **Output:** "4321"
- **Explanation:**
  Some possible values of num are "9876", "7321", and "8742".
  It can be proven that "4321" is the smallest possible num that meets the conditions.



**Constraints:**

- `1 <= pattern.length <= 8`
- `pattern` consists of only the letters `'I'` and `'D'`.


**Hint:**
1. With the constraints, could we generate every possible string?
2. Yes we can. Now we just need to check if the string meets all the conditions.



**Solution:**

We need to construct the lexicographically smallest possible number string based on a given pattern of 'I' (increasing) and 'D' (decreasing) characters. The solution must ensure that each digit from 1 to 9 is used exactly once and that the sequence adheres to the given pattern.

### Approach
The key insight is to recognize that consecutive 'D' characters in the pattern require a decreasing sequence of digits. By reversing segments of an initially increasing sequence of digits whenever a group of consecutive 'D's is encountered, we can efficiently generate the required sequence. This approach ensures that we produce the lexicographically smallest sequence by leveraging the properties of reversing segments to handle decreasing sequences.

Let's implement this solution in PHP: **[2375. Construct Smallest Number From DI String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002375-construct-smallest-number-from-di-string/solution.php)**

```php
<?php
/**
 * @param String $pattern
 * @return String
 */
function smallestNumber($pattern) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $arr
 * @param $start
 * @param $end
 * @return void
 */
function reverseSubarray(&$arr, $start, $end) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example cases
echo smallestNumber("IIIDIDDD") . "\n"; // Output: "123549876"
echo smallestNumber("DDD") . "\n";       // Output: "4321"
?>
```

### Explanation:

1. **Initialization**: Start with the smallest possible sequence of digits from 1 to n+1, where n is the length of the pattern.
2. **Iterate through the Pattern**: Traverse each character in the pattern to identify segments of consecutive 'D's.
3. **Reverse Segments for 'D's**: For each segment of consecutive 'D's, reverse the corresponding segment in the digit sequence to ensure the required decreasing order.
4. **Construct Result**: Convert the resulting array of digits into a string and return it.

This approach efficiently constructs the required sequence by reversing only the necessary segments, ensuring the solution is both optimal and runs in linear time relative to the length of the pattern.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**