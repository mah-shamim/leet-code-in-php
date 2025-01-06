131\. Palindrome Partitioning

**Difficulty:** Medium

**Topics:** `String`, `Dynamic Programming`, `Backtracking`

Given a string `s`, partition `s` such that every substring[^1] of the partition is a palindrome[^2]. Return all possible palindrome partitioning of `s`.

**Example 1:**

- **Input:** s = "aab"
- **Output:** [["a","a","b"],["aa","b"]]

**Example 2:**

- **Input:** s = "a"
- **Output:** [["a"]]

**Constraints:**

- <code>1 <= s.length <= 16</code>
- `s` contains only lowercase English letters.

[^1]: **Substring** A **substring** is a contiguous non-empty sequence of characters within a string.

[^2]: **Palindrome** A **palindrome** is a string that reads the same forward and backward.


**Solution:**


We can use a combination of backtracking and dynamic programming. The goal is to explore all possible partitions and check if each partition is a palindrome.

### Steps to Solve:

1. **Backtracking**:
    - We'll explore every possible partitioning of the string. For each possible starting index, we try to partition the string at every possible end index.
    - If a substring is a palindrome, we recursively partition the remaining string.

2. **Palindrome Check**:
    - We need a helper function to check if a given substring is a palindrome. This can be done by comparing the substring with its reverse.

3. **Collect Results**:
    - When we reach the end of the string, we've found a valid partitioning, so we add it to the result list.


Let's implement this solution in PHP: **[131. Palindrome Partitioning](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000131-palindrome-partitioning/solution.php)**

```php
<?php
// Example usage:
$s1 = "aab";
$s2 = "a";
print_r(partition($s1)); // Output: [["a","a","b"],["aa","b"]]
print_r(partition($s2)); // Output: [["a"]]
?>
```

### Explanation:

1. **`partition($s)`**: This function initializes the backtracking process.
2. **`backtrack($s, $start, &$current, &$result)`**:
    - It explores each substring starting at index `start`.
    - If a palindrome is found, it's added to the current partition (`$current`), and the function is called recursively for the next part of the string.
    - Once all partitions from the current start point are explored, the last substring is removed from `$current` to backtrack and try other possibilities.
3. **`isPalindrome($s)`**: This helper function checks if a string is a palindrome by comparing characters from the start and end.

### Time Complexity:
- The time complexity is exponential in the worst case, as we explore all possible partitions (backtracking).
- The palindrome check is \(O(n)\) for each substring.

This solution works efficiently for the given constraint where the maximum length of the string is 16.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
