2138\. Divide a String Into Groups of Size k

**Difficulty:** Easy

**Topics:** `String`, `Simulation`

A string `s` can be partitioned into groups of size `k` using the following procedure:

- The first group consists of the first `k` characters of the string, the second group consists of the next `k` characters of the string, and so on. Each element can be a part of **exactly one** group.
- For the last group, if the string **does not** have `k` characters remaining, a character `fill` is used to complete the group.

**Note** that the partition is done so that after removing the `fill` character from the last group (if it exists) and concatenating all the groups in order, the resultant string should be `s`.

Given the string `s`, the size of each group `k` and the character `fill`, return _a string array denoting the **composition of every group** `s` has been divided into, using the above procedure_.

**Example 1:**

- **Input:** s = "abcdefghi", k = 3, fill = "x"
- **Output:** ["abc","def","ghi"]
- **Explanation:**
  The first 3 characters "abc" form the first group.
  The next 3 characters "def" form the second group.
  The last 3 characters "ghi" form the third group.
  Since all groups can be completely filled by characters from the string, we do not need to use fill.
  Thus, the groups formed are "abc", "def", and "ghi".

**Example 2:**

- **Input:** s = "abcdefghij", k = 3, fill = "x"
- **Output:** ["abc","def","ghi","jxx"]
- **Explanation:**
  Similar to the previous example, we are forming the first three groups "abc", "def", and "ghi".
  For the last group, we can only use the character 'j' from the string. To complete this group, we add 'x' twice.
  Thus, the 4 groups formed are "abc", "def", "ghi", and "jxx".


**Constraints:**

- `1 <= s.length <= 100`
- `s` consists of lowercase English letters only.
- `1 <= k <= 100`
- `fill` is a lowercase English letter.


**Hint:**
1. Using the length of the string and k, can you count the number of groups the string can be divided into?
2. Try completing each group using characters from the string. If there aren’t enough characters for the last group, use the fill character to complete the group.


**Similar Questions:**
1. [68. Text Justification](https://leetcode.com/problems/text-justification/description/)
2. [830. Positions of Large Groups](https://leetcode.com/problems/positions-of-large-groups/description/)





**Solution:**

We need to divide a given string into groups of size `k`. Each group should contain exactly `k` characters, except possibly the last group, which may need to be padded with a specified fill character if there aren't enough characters left in the string. The solution involves iterating through the string, extracting each group, and padding the last group if necessary.

### Approach
1. **Problem Analysis**: The task is to partition the string into segments of size `k`. If the string length is not a multiple of `k`, the last segment will have fewer than `k` characters, which need to be padded with the fill character to make its length `k`.
2. **Intuition**: By iterating over the string in steps of `k`, we can extract each segment. For each segment, if its length is less than `k`, we pad it with the fill character to meet the required size.
3. **Algorithm Selection**: The algorithm involves:
   - Calculating the length of the string.
   - Using a loop to process each segment starting from index `0` to the end of the string, incrementing by `k` each time.
   - For each segment, extract a substring of length `k` starting at the current index. If fewer than `k` characters remain, pad the substring with the fill character to make it length `k`.
4. **Complexity Analysis**: The algorithm processes each character exactly once, making it O(n) time complexity, where `n` is the length of the string. The space complexity is O(n) to store the resulting groups.

Let's implement this solution in PHP: **[2138. Divide a String Into Groups of Size k](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002138-divide-a-string-into-groups-of-size-k/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @param String $fill
 * @return String[]
 */
function divideString($s, $k, $fill) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
print_r(divideString("abcdefghi", 3, "x"));
// Output: Array ( [0] => abc [1] => def [2] => ghi )

// Example 2
print_r(divideString("abcdefghij", 3, "x"));
// Output: Array ( [0] => abc [1] => def [2] => ghi [3] => jxx )
?>
```

### Explanation:

1. **Initialization**: The function starts by determining the length of the input string `s`.
2. **Iteration**: The loop processes the string in chunks of size `k`. The loop variable `$i` starts at `0` and increments by `k` each iteration.
3. **Chunk Extraction**: For each iteration, a substring of length `k` starting at position `$i` is extracted. If the remaining characters are fewer than `k`, the substring will contain all remaining characters.
4. **Padding Check**: If the extracted substring is shorter than `k`, it is padded to the right with the fill character to ensure its length is `k`.
5. **Result Construction**: Each processed chunk (either as-is or padded) is added to the result array.
6. **Return Result**: The result array, containing all the processed chunks, is returned after processing the entire string.

This approach efficiently partitions the string into groups of the specified size, handling any necessary padding for the last group, and returns the result as an array of strings.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**