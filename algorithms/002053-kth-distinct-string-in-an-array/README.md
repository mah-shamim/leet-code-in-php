2053\. Kth Distinct String in an Array

Easy

A **distinct string** is a string that is present only **once** in an array.

Given an array of strings `arr`, and an integer `k`, return _the <code>k<sup>th</sup></code> **distinct string** present in `arr`_. If there are **fewer** than `k` distinct strings, return _an **empty string** `""`_.

**Note** that the strings are considered in the **order in which they appear** in the array.

**Example 1:**

- **Input:** arr = ["d","b","c","b","c","a"], k = 2
- **Output:** "a"
- **Explanation:**\
  The only distinct strings in arr are "d" and "a".\
  "d" appears 1<sup>st</sup>, so it is the 1<sup>st</sup> distinct string.\
  "a" appears 2<sup>nd</sup>, so it is the 2<sup>nd</sup> distinct string.\
  Since k == 2, "a" is returned.

**Example 2:**

- **Input:** arr = ["aaa","aa","a"], k = 1
- **Output:** "aaa"
- **Explanation:** All strings in arr are distinct, so the 1st string "aaa" is returned.

**Example 3:**

- **Input:** arr = ["a","b","a"], k = 3
- **Output:** ""
- **Explanation:** The only distinct string is "b". Since there are fewer than 3 distinct strings, we return an empty string "".

**Constraints:**

- <code>1 <= k <= arr.length <= 1000</code>
- <code>1 <= arr[i].length <= 5</code>
- `arr[i]` consists of lowercase English letters.

**Hint:**
1. Try 'mapping' the strings to check if they are unique or not.


**Solution:**


To solve this problem, we can follow these steps:

1. Create a frequency map (associative array) to count the occurrences of each string in the given array.
2. Iterate through the array to collect the distinct strings (strings that appear only once) in the order they appear.
3. Check if the number of distinct strings is at least `k`. If yes, return the k-th distinct string; otherwise, return an empty string.

Let's implement this solution in PHP: **[2053. Kth Distinct String in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002053-kth-distinct-string-in-an-array/solution.php)**

```php
<?php
// Test cases
$arr1 = array("d", "b", "c", "b", "c", "a");
$k1 = 2;
echo kthDistinct($arr1, $k1) . "\n"; // Output: "a"

$arr2 = array("aaa", "aa", "a");
$k2 = 1;
echo kthDistinct($arr2, $k2) . "\n"; // Output: "aaa"

$arr3 = array("a", "b", "a");
$k3 = 3;
echo kthDistinct($arr3, $k3) . "\n"; // Output: ""

?>
```

### Explanation:
1. **Frequency Map**: We first create a frequency map to count how many times each string appears in the array.
    - `["d", "b", "c", "b", "c", "a"]` results in `["d" => 1, "b" => 2, "c" => 2, "a" => 1]`
2. **Collect Distinct Strings**: We iterate through the array again, collecting strings that have a count of `1` in the frequency map.
    - For `["d", "b", "c", "b", "c", "a"]`, we get `["d", "a"]`.
3. **Return Result**: We check if there are at least `k` distinct strings and return the `k`-th one if it exists, otherwise return an empty string.

The provided code handles the problem efficiently within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
