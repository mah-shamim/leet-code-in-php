2840\. Check if Strings Can be Made Equal With Operations II

**Difficulty:** Medium

**Topics:** `Senior`, `Hash Table`, `String`, `Sorting`, `Biweekly Contest 112`

You are given two strings `s1` and `s2`, both of length `n`, consisting of **lowercase** English letters.

You can apply the following operation on **any** of the two strings **any** number of times:

- Choose any two indices `i` and `j` such that `i < j` and the difference `j - i` is **even**, then **swap** the two characters at those indices in the string.

Return _`true` if you can make the strings `s1` and `s2` equal, and `false` otherwise_.

**Example 1:**

- **Input:** s1 = "abcdba", s2 = "cabdab"
- **Output:** true
- **Explanation:** We can apply the following operations on s1:
  - Choose the indices i = 0, j = 2. The resulting string is s1 = "cbadba".
  - Choose the indices i = 2, j = 4. The resulting string is s1 = "cbbdaa".
  - Choose the indices i = 1, j = 5. The resulting string is s1 = "cabdab" = s2.

**Example 2:**

- **Input:** s1 = "abe", s2 = "bea"
- **Output:** false
- **Explanation:** It is not possible to make the two strings equal.

**Example 3:**

- **Input:** s1 = "abc", s2 = "cba"
- **Output:** true

**Constraints:**

- `n == s1.length == s2.length`
- `1 <= n <= 10⁵`
- `s1` and `s2` consist only of lowercase English letters.



**Hint:**
1. Characters in two positions can be swapped if and only if the two positions have the same parity.
2. To be able to make the two strings equal, the characters at even and odd positions in the strings should be the same.






**Solution:**

The problem asks whether two strings of equal length can be made identical by repeatedly swapping characters whose indices differ by an even number. The solution recognizes that swaps are only possible between positions of the same parity (both even or both odd). Therefore, the multiset of characters at even indices in `s1` must match that in `s2`, and similarly for odd indices. The PHP implementation counts character frequencies separately for even and odd positions in both strings and compares the frequency arrays.

### Approach:

- Observe that the allowed operation swaps characters at positions `i` and `j` when `j - i` is even, which means `i` and `j` have the same parity (both even or both odd).
- Therefore, characters can be rearranged freely within the even‑index group and within the odd‑index group, but characters cannot move between groups.
- To make `s1` equal to `s2`, the multiset of characters at even positions in `s1` must be exactly the same as the multiset of characters at even positions in `s2`, and likewise for odd positions.
- The solution initialises four fixed‑size arrays (26 counters for each parity in each string).
- It iterates through the strings once, incrementing the appropriate counter for each character based on its index parity.
- Finally, it checks if the even‑count arrays are identical and the odd‑count arrays are identical.

Let's implement this solution in PHP: **[2840. Check if Strings Can be Made Equal With Operations II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002840-check-if-strings-can-be-made-equal-with-operations-ii/solution.php)**

```php
<?php
/**
 * @param String $s1
 * @param String $s2
 * @return Boolean
 */
function checkStrings(string $s1, string $s2): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo checkStrings("abcdba", "cabdab") . "\n";           // Output: true
echo checkStrings("abe", "bea") . "\n";                 // Output: false
echo checkStrings(["abc", "cba") . "\n";                // Output: true
?>
```

### Explanation:

- **Parity groups**: Swapping only allowed between indices of the same parity partitions the string into two independent groups: even indices (0,2,4,…) and odd indices (1,3,5,…).
- **Character counting**: By counting character frequencies separately for each group, we capture exactly what multiset of letters can be formed in that group after any sequence of swaps.
- **Comparison**: If the frequency vectors for even positions in `s1` and `s2` match, and the vectors for odd positions also match, then we can reorder each group independently to make the strings equal. Otherwise, it is impossible.
- **Efficiency**: The counting is done in a single pass, using only O(1) extra space because the alphabet size is fixed (26 lowercase letters).
- **Edge cases**: If a string length is 1, there is only one parity group; the logic still holds because the other group will have zero counts.

### Complexity
- **Time Complexity**: _**O(n)**_, where n is the length of the strings. A single pass with constant‑time operations per character.
- **Space Complexity**: _**O(1)**_, since only four arrays of size 26 are used, independent of the input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**