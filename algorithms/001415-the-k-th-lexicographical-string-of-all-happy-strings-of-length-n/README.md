1415\. The k-th Lexicographical String of All Happy Strings of Length n

**Difficulty:** Medium

**Topics:** `String`, `Backtracking`

A **happy string** is a string that:

- consists only of letters of the set `['a', 'b', 'c']`.
- `s[i] != s[i + 1]` for all values of `i` from `1` to `s.length - 1` (string is 1-indexed).

For example, strings **"abc"**, **"ac"**, **"b"** and **"abcbabcbcb"** are all happy strings and strings **"aa"**, **"baa"** and **"ababbc"** are not happy strings.

Given two integers `n` and `k`, consider a list of all happy strings of length `n` sorted in lexicographical order.

Return _the kth string of this list or return an **empty string** if there are less than `k` happy strings of length `n`_.

**Example 1:**

- **Input:** n = 1, k = 3
- **Output:** "c"
- **Explanation:** The list ["a", "b", "c"] contains all happy strings of length 1. The third string is "c".

**Example 2:**

- **Input:** n = 1, k = 4
- **Output:** ""
- **Explanation:** There are only 3 happy strings of length 1.


**Example 3:**

- **Input:** n = 3, k = 9
- **Output:** "cab"
- **Explanation:** There are 12 different happy string of length 3 ["aba", "abc", "aca", "acb", "bab", "bac", "bca", "bcb", "cab", "cac", "cba", "cbc"]. You will find the 9th string = "cab"



**Constraints:**

- 1 <= n <= 10
- 1 <= k <= 100


**Hint:**
1. Generate recursively all the happy strings of length n.
2. Sort them in lexicographical order and return the kth string if it exists.



**Solution:**

We need to generate all possible happy strings of a given length `n` and return the k-th string in lexicographical order. A happy string is defined as a string consisting of characters 'a', 'b', and 'c' where no two consecutive characters are the same.

### Approach
1. **Generate Happy Strings**: Use a backtracking approach to generate all possible happy strings of length `n`. This involves recursively building strings character by character, ensuring that each new character is different from the previous one.
2. **Check Validity of k**: If the number of generated happy strings is less than `k`, return an empty string.
3. **Return k-th String**: Since the generated strings are already in lexicographical order due to the order of character selection ('a', 'b', 'c'), we can directly access the k-th element (adjusting for 1-based indexing).

Let's implement this solution in PHP: **[1415. The k-th Lexicographical String of All Happy Strings of Length n](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001415-the-k-th-lexicographical-string-of-all-happy-strings-of-length-n/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $k
 * @return String
 */
function getHappyString($n, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $current
 * @param $remaining
 * @param $last_char
 * @param $result
 * @return void
 */
function generate($current, $remaining, $last_char, &$result) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo getHappyString(1, 3) . "\n"; // Output: "c"
echo getHappyString(1, 4) . "\n"; // Output: ""
echo getHappyString(3, 9) . "\n"; // Output: "cab"
?>
```

### Explanation:

1. **Backtracking Generation**: The `generate` function builds happy strings by recursively appending characters 'a', 'b', or 'c' to the current string, ensuring each new character is different from the last. This is done by checking against the previous character (`last_char`).
2. **Base Case**: When the remaining length to be filled (`remaining`) reaches 0, the current string is added to the result list.
3. **Lexicographical Order**: By iterating through characters in the order 'a', 'b', 'c' at each step, the generated strings are naturally in lexicographical order without needing explicit sorting.
4. **Efficiency**: This approach efficiently generates all valid strings and checks the count against `k`, ensuring we only generate necessary strings and directly access the k-th element if valid.

This method ensures that we generate all possible happy strings in an optimal manner and leverage the natural lexicographical order of character selection to avoid sorting, resulting in an efficient solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**