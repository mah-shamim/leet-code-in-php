3016\. Minimum Number of Pushes to Type Word II

**Difficulty:** Medium

**Topics** : `Staff`, `Hash Table`, `String`, `Greedy`, `Sorting`, `Counting`, `Weekly Contest 381`

You are given a string `word` containing lowercase English letters.

Telephone keypads have keys mapped with distinct collections of lowercase English letters, which can be used to form words by pushing them. For example, the key `2` is mapped with `["a","b","c"]`, we need to push the key one time to type `"a"`, two times to type `"b"`, and three times to type `"c"` .

It is allowed to remap the keys numbered `2` to `9` to **distinct** collections of letters. The keys can be remapped to **any** amount of letters, but each letter **must** be mapped to **exactly** one key. You need to find the **minimum** number of times the keys will be pushed to type the string `word`.

Return _the minimum **number** of pushes needed to type `word` after remapping the keys_.

An example mapping of letters to keys on a telephone keypad is given below. Note that `1`, `*`, `#`, and `0` do **not** map to any letters.

![keypaddesc](https://assets.leetcode.com/uploads/2023/12/26/keypaddesc.png)

**Example 1:**

![keypadv1e1](https://assets.leetcode.com/uploads/2023/12/26/keypadv1e1.png)

- **Input:** word = "abcde"
- **Output:** 5
- **Explanation:** The remapped keypad given in the image provides the minimum cost.\
  "a" -> one push on key 2\
  "b" -> one push on key 3\
  "c" -> one push on key 4\
  "d" -> one push on key 5\
  "e" -> one push on key 6\
  Total cost is 1 + 1 + 1 + 1 + 1 = 5.\
  It can be shown that no other mapping can provide a lower cost.

**Example 2:**

![keypadv2e2](https://assets.leetcode.com/uploads/2023/12/26/keypadv2e2.png)

- **Input:** word = "xyzxyzxyzxyz"
- **Output:** 12
- **Explanation:** The remapped keypad given in the image provides the minimum cost.\
  "x" -> one push on key 2\
  "y" -> one push on key 3\
  "z" -> one push on key 4\
  Total cost is 1 * 4 + 1 * 4 + 1 * 4 = 12\
  It can be shown that no other mapping can provide a lower cost.\
  Note that the key 9 is not mapped to any letter: it is not necessary to map letters to every key, but to map all the letters.

**Example 3:**

![keypadv2](https://assets.leetcode.com/uploads/2023/12/27/keypadv2.png)

- **Input:** word = "aabbccddeeffgghhiiiiii"
- **Output:** 24
- **Explanation:** The remapped keypad given in the image provides the minimum cost.\
  "a" -> one push on key 2\
  "b" -> one push on key 3\
  "c" -> one push on key 4\
  "d" -> one push on key 5\
  "e" -> one push on key 6\
  "f" -> one push on key 7\
  "g" -> one push on key 8\
  "h" -> two pushes on key 9\
  "i" -> one push on key 9\
  Total cost is 1 * 2 + 1 * 2 + 1 * 2 + 1 * 2 + 1 * 2 + 1 * 2 + 1 * 2 + 2 * 2 + 6 * 1 = 24.\
  It can be shown that no other mapping can provide a lower cost.

**Example 4:**

- **Input:** word = "a"
- **Output:** 1

**Example 5:**

- **Input:** word = "aaaa"
- **Output:** 4

**Example 6:**

- **Input:** word = "abcdefghijklmnopqrstuvwxyz"
- **Output:** 26

**Example 7:**

- **Input:** word = "aaaaabbbbbcccccdddddeeeeefffffggggghhhhh"
- **Output:** 40

**Constraints:**

- <code>1 <= word.length <= 10<sup>5</sup></code>
- `word` consists of lowercase English letters.

**Hint:**
1. We have 8 keys in total. We can type 8 characters with one push each, 8 different characters with two pushes each, and so on.
2. The optimal way is to map letters to keys evenly.
3. Sort the letters by frequencies in the word in non-increasing order.


**Similar Questions:**
1. [17. Letter Combinations of a Phone Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000017-letter-combinations-of-a-phone-number)


**Solution:**

We first count the frequency of each character in the given string. Since we have 8 keys (2–9) and each key can hold multiple letters, the most frequent letters should be assigned to the smallest number of pushes (i.e., first 8 letters get 1 push, next 8 get 2 pushes, and so on). We sort frequencies in descending order and calculate the total pushes accordingly.

### Approach

- **Count frequencies** of each character in `word`.
- **Sort frequencies** in descending order.
- **Assign pushes**:
    - The 1st to 8th most frequent letters get 1 push each.
    - The 9th to 16th get 2 pushes each, and so on.
- **Calculate total pushes** by multiplying each frequency with its assigned push count and summing them.

Let's implement this solution in PHP: **[3016. Minimum Number of Pushes to Type Word II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003016-minimum-number-of-pushes-to-type-word-ii/solution.php)**

```php
<?php
/**
 * @param String $word
 * @return Integer
 */
function minimumPushes(string $word): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumPushes("abcde") . "\n";                                             // Output: 5
echo minimumPushes("xyzxyzxyzxyz") . "\n";                                      // Output: 12
echo minimumPushes("aabbccddeeffgghhiiiiii") . "\n";                            // Output: 24
echo minimumPushes("a") . "\n";                                                 // Output: 1
echo minimumPushes("aaaa") . "\n";                                              // Output: 4
echo minimumPushes("abcdefghijklmnopqrstuvwxyz") . "\n";                        // Output: 26
echo minimumPushes("aaaaabbbbbcccccdddddeeeeefffffggggghhhhh") . "\n";          // Output: 40
?>
```

### Explanation:

- There are exactly 8 keys available for mapping (2 to 9).
- To minimize pushes, we assign the most frequent letters to the keys that require the fewest pushes.
- The first 8 distinct letters will need only 1 push each, the next 8 will need 2 pushes each, etc.
- This is optimal because we maximize the benefit (low push count) for the most frequent letters.
- Sorting frequencies in descending order ensures we assign smaller push counts to higher frequencies.
- The position index (0-based) determines the push count: `floor(position / 8) + 1`.


### Complexity Analysis

- **Time Complexity:** _**O(n + k log k)**_, where `n` = length of `word`, `k` = number of distinct characters (at most 26). Counting is _**O(n)**_, sorting is `O(26 log 26)` which is constant.
- **Space Complexity:** _**O(k)**_ for storing frequencies, at most `O(26)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**