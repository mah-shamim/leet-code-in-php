3016\. Minimum Number of Pushes to Type Word II

**Difficulty:** Medium

**Topics** : `Hash Table`, `String`, `Greedy`, `Sorting`, `Counting`, `Weekly Contest 381`

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


To solve this problem, we can follow these steps:

1. **Count the Frequency of Each Character**: Determine how often each character appears in the input word.
2. **Sort the Characters by Frequency**: Sort these characters in descending order based on their frequency.
3. **Assign Characters to Keys**: Allocate the characters to keys (2-9) such that the most frequent characters are assigned to the keys requiring the fewest pushes.

### Step-by-Step Implementation in PHP

1. **Count the Frequency of Each Character**:
    - Use an associative array to store the frequency of each character.

2. **Sort the Characters by Frequency**:
    - Sort the characters based on their frequency in descending order.

3. **Assign Characters to Keys**:
    - Iterate through the sorted characters and assign them to keys. The first 8 characters get 1 push each, the next 8 characters get 2 pushes each, and so on.

Let's implement this solution in PHP: **[3016. Minimum Number of Pushes to Type Word II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003016-minimum-number-of-pushes-to-type-word-ii/solution.php)**

```php
<?php
// Test cases
echo minimumPushes("abcde") . "\n"; // Output: 5
echo minimumPushes("xyzxyzxyzxyz") . "\n"; // Output: 12
echo minimumPushes("aabbccddeeffgghhiiiiii") . "\n"; // Output: 24
?>
```

### Explanation:

1. **Counting Frequencies**:
    - We iterate through the word and count the occurrences of each character using an associative array `$frequency`.

2. **Sorting by Frequency**:
    - We use `arsort` to sort the associative array `$frequency` by its values in descending order.

3. **Calculating Pushes**:
    - We initialize `$pushes` to zero and iterate over the sorted frequency array.
    - The number of pushes required for each character is calculated based on its position in the sorted array. Characters at positions 0-7 require 1 push, positions 8-15 require 2 pushes, and so on.
    - We incrementally calculate the total number of pushes required to type the word.

This approach ensures that the most frequent characters are assigned to the keys that require the fewest pushes, thereby minimizing the total number of pushes needed.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
