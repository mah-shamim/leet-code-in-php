1593\. Split a String Into the Max Number of Unique Substrings

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Backtracking`

Given a string `s`, return _the maximum number of unique substrings that the given string can be split into_.

You can split string `s` into any list of **non-empty substrings**, where the concatenation of the substrings forms the original string. However, you must split the substrings such that all of them are **unique**.

A **substring** is a contiguous sequence of characters within a string.

**Example 1:**

- **Input:** s = "ababccc"
- **Output:** 5
- **Explanation:** One way to split maximally is ['a', 'b', 'ab', 'c', 'cc']. Splitting like ['a', 'b', 'a', 'b', 'c', 'cc'] is not valid as you have 'a' and 'b' multiple times.

**Example 2:**

- **Input:** s = "aba"
- **Output:** 2
- **Explanation:** One way to split maximally is ['a', 'ba'].


**Example 3:**

- **Input:** s = "aa"
- **Output:** 1
- **Explanation:** It is impossible to split the string any further.



**Constraints:**

- `1 <= s.length <= 16`
- `s` contains only lower case English letters.


**Hint:**
1. Use a set to keep track of which substrings have been used already
2. Try each possible substring at every position and backtrack if a complete split is not possible



**Solution:**

We can use a backtracking approach. This involves recursively trying to create substrings from the current position in the string and keeping track of the unique substrings we've used so far.

Here's a step-by-step solution:

1. **Recursive Function**: Create a function that will explore all possible substrings starting from the current index of the string.
2. **Set for Uniqueness**: Use a set (or an array in PHP) to keep track of the unique substrings that have been used in the current recursion path.
3. **Backtracking**: When a substring is chosen, we can continue to choose the next substring. If we reach a point where no further substrings can be formed without repeating, we backtrack.
4. **Base Case**: If we reach the end of the string, we count the unique substrings formed.

Let's implement this solution in PHP: **[1593. Split a String Into the Max Number of Unique Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001593-split-a-string-into-the-max-number-of-unique-substrings/solution.php)**

```php
<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxUniqueSplit($s) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $s
     * @param $used
     * @param $start
     * @return int|mixed
     */
    private function backtrack($s, $used, $start) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage
$solution = new Solution();
echo $solution->maxUniqueSplit("ababccc"); // Output: 5
echo "\n";
echo $solution->maxUniqueSplit("aba"); // Output: 2
echo "\n";
echo $solution->maxUniqueSplit("aa"); // Output: 1
?>
```

### Explanation:

1. **Function Signature**: The main function is `maxUniqueSplit`, which initializes the backtracking process.

2. **Backtracking**:
   - The `backtrack` function takes the string, the array of used substrings, and the current starting index.
   - If the `start` index reaches the end of the string, it returns the count of unique substrings collected.
   - A loop iterates through possible end indices to create substrings from the `start` index.
   - If the substring is unique (not already in the `used` array), it's added to `used`, and the function recurses for the next index.
   - After exploring that path, it removes the substring to backtrack and explore other possibilities.

3. **Output**: The function returns the maximum number of unique substrings for various input strings.

### Complexity
- The time complexity can be high due to the nature of backtracking, especially for longer strings, but given the constraints (maximum length of 16), this solution is efficient enough for the input limits.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
