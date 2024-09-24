3043\. Find the Length of the Longest Common Prefix

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Trie`

You are given two arrays with **positive** integers `arr1` and `arr2`.

A **prefix** of a positive integer is an integer formed by one or more of its digits, starting from its **leftmost** digit. For example, `123` is a prefix of the integer `12345`, while `234` is **not**.

A **common prefix** of two integers `a` and `b` is an integer `c`, such that `c` is a prefix of both `a` and `b`. For example, `5655359` and `56554` have a common prefix `565` while `1223` and `43456` **do not** have a common prefix.

You need to find the length of the **longest common prefix** between all pairs of integers `(x, y)` such that `x` belongs to `arr1` and `y` belongs to `arr2`.

Return _the length of the **longest** common prefix among all pairs. If no common prefix exists among them, return `0`_.

**Example 1:**

- **Input:** arr1 = [1,10,100], arr2 = [1000]
- **Output:** 3
- **Explanation:** There are 3 pairs (arr1[i], arr2[j]):
  - The longest common prefix of (1, 1000) is 1.
  - The longest common prefix of (10, 1000) is 10.
  - The longest common prefix of (100, 1000) is 100.\
   The longest common prefix is 100 with a length of 3.

**Example 2:**

- **Input:** arr1 = [1,2,3], arr2 = [4,4,4]
- **Output:** 4
- **Explanation:** There exists no common prefix for any pair (arr1[i], arr2[j]), hence we return 0.\
  Note that common prefixes between elements of the same array do not count.



**Constraints:**

- <code>1 <= arr1.length, arr2.length <= 5 * 10<sup>4</sup></code>
- <code>1 <= arr1[i], arr2[i] <= 10<sup>8</sup></code>


**Hint:**
1. Put all the possible prefixes of each element in `arr1` into a HashSet.
2. For all the possible prefixes of each element in `arr2`, check if it exists in the HashSet.



**Solution:**

We can utilize a HashSet to store the prefixes from one array and then check for those prefixes in the second array.

### Approach:

1. **Generate Prefixes**: For each number in `arr1` and `arr2`, generate all possible prefixes. A prefix is formed by one or more digits starting from the leftmost digit.

2. **Store Prefixes of `arr1` in a Set**: Using a `HashSet` to store all prefixes of numbers in `arr1` ensures fast lookups when checking prefixes from `arr2`.

3. **Find Longest Common Prefix**: For each number in `arr2`, generate its prefixes and check if any of these prefixes exist in the `HashSet` from step 2. Track the longest prefix found.

4. **Return the Length of the Longest Common Prefix**: If a common prefix is found, return its length; otherwise, return `0`.

Let's implement this solution in PHP: **[3043. Find the Length of the Longest Common Prefix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003043-find-the-length-of-the-longest-common-prefix/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr1
 * @param Integer[] $arr2
 * @return Integer
 */
function longestCommonPrefix($arr1, $arr2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$arr1 = [1, 10, 100];
$arr2 = [1000];
echo longestCommonPrefix($arr1, $arr2); // Output: 3

$arr1 = [1, 2, 3];
$arr2 = [4, 4, 4];
echo longestCommonPrefix($arr1, $arr2); // Output: 0
?>
```

### Explanation:

1. **HashSet Creation**:
   - We first create an associative array `$prefixSet` to hold all possible prefixes of numbers in `arr1`.
   - We iterate through each number in `arr1`, convert it to a string, and extract all its prefixes using the `substr` function. Each prefix is stored in the `$prefixSet`.

2. **Prefix Checking**:
   - Next, we loop through each number in `arr2`, converting it to a string as well.
   - For each number in `arr2`, we again extract all possible prefixes.
   - If a prefix exists in `$prefixSet`, we check if its length is greater than the current maximum length found (`$maxLength`).

3. **Return the Result**:
   - Finally, we return the length of the longest common prefix found.

### Complexity:
- **Time Complexity**: O(n * m) where n and m are the lengths of `arr1` and `arr2` respectively. This is because we are processing every number and their prefixes.
- **Space Complexity**: O(p) where p is the total number of prefixes stored in the HashSet.

This solution is efficient and works well within the provided constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
