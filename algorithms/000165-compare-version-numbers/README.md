165\. Compare Version Numbers

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`

Given two version numbers, `version1` and `version2`, compare them.

Version numbers consist of **one or more revisions** joined by a dot `'.'`. Each revision consists of **digits** and may contain leading **zeros**. Every revision contains **at least one character**. Revisions are **0-indexed from left to right**, with the leftmost revision being revision 0, the next revision being revision 1, and so on. For example `2.5.33` and `0.1` are valid version numbers.

To compare version numbers, compare their revisions in **left-to-right order**. Revisions are compared using their **integer value ignoring any leading zeros**. This means that revisions `1` and `001` are considered **equal**. If a version number does not specify a revision at an index, then **treat the revision** as `0`. For example, version `1.0` is less than version `1.1` because their revision 0s are the same, but their revision 1s are `0` and `1` respectively, and `0 < 1`.

_Return the following:_

- If `version1 < version2`, return `-1`.
- If `version1 > version2`, return `1`.
- Otherwise, return `0`.


**Example 1:**

- **Input:** version1 = "1.01", version2 = "1.001"
- **Output:** 0
- **Explanation:** Ignoring leading zeroes, both "01" and "001" represent the same integer "1". 

**Example 2:**

- **Input:** version1 = "1.0", version2 = "1.0.0"
- **Output:** 0
- **Explanation:** version1 does not specify revision 2, which means it is treated as "0".

**Example 3:**

- **Input:** version1 = "0.1", version2 = "1.1"
- **Output:** -1
- **Explanation:** version1's revision 0 is "0", while version2's revision 0 is "1". 0 < 1, so version1 < version2.

**Constraints:**

- <code>1 <= version1.length, version2.length <= 500</code>
- `version1` and `version2` only contain digits and `'.'`.
- `version1` and `version2` **are valid version numbers**.
- All the given revisions in `version1` and `version2` can be stored in a **32-bit integer**.

**Hint:**
1. You can use two pointers for each version string to traverse them together while comparing the corresponding segments.
2. Utilize the substring method to extract each version segment delimited by '.'. Ensure you're extracting the segments correctly by adjusting the start and end indices accordingly.


**Solution:**


We can use a two-pointer approach to traverse each version number and compare their segments.

1. **Split the Versions**: Use `explode` to split each version number by the dot `'.'` character into arrays of segments.
2. **Traverse and Compare Segments**: Use two pointers to traverse the segments of each version. Compare corresponding segments as integers, taking care of leading zeros and treating missing segments as `0`.

Let's implement this solution in PHP: **[165. Compare Version Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000165-compare-version-numbers/solution.php)**

```php
<?php
// Example usage
echo compareVersion("1.01", "1.001"); // Output: 0
echo compareVersion("1.0", "1.0.0"); // Output: 0
echo compareVersion("0.1", "1.1"); // Output: -1
?>
```

### Explanation:

1. **Splitting Versions**:
    - `explode('.', $version1)` and `explode('.', $version2)` convert each version string into arrays of segments based on the dot delimiter.

2. **Traversing Segments**:
    - `max(count($v1), count($v2))` ensures that the loop runs through the longest of the two version arrays.
    - `isset($v1[$i]) ? (int)$v1[$i] : 0` gets the segment value or defaults to `0` if the segment does not exist.

3. **Comparing Segments**:
    - Compare each segment as integers to handle leading zeros.
    - Return `-1` if the first version is less, `1` if it is greater, and `0` if they are equal after all segments are compared.

This solution efficiently compares version numbers by considering each segment as an integer and handles cases where versions have different lengths by treating missing segments as `0`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
