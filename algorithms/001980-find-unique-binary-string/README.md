1980\. Find Unique Binary String

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `String`, `Backtracking`, `Weekly Contest 255`

Given an array of strings `nums` containing `n` **unique** binary strings each of length `n`, return _a binary string of length `n` that **does not appear** in `nums`. If there are multiple answers, you may return **any** of them_.

**Example 1:**

- **Input:** nums = ["01","10"]
- **Output:** "11"
- **Explanation:** "11" does not appear in nums. "00" would also be correct.

**Example 2:**

- **Input:** nums = ["00","01"]
- **Output:** "11"
- **Explanation:** "11" does not appear in nums. "10" would also be correct.


**Example 3:**

- **Input:** nums = ["111","011","001"]
- **Output:** "101"
- **Explanation:** "101" does not appear in nums. "000", "010", "100", and "110" would also be correct.



**Constraints:**

- `n == nums.length`
- `1 <= n <= 16`
- `nums[i].length == n`
- `nums[i]` is either `'0'` or `'1'`.
- All the strings of `nums` are **unique**.


**Hint:**
1. We can convert the given strings into base 10 integers.
2. Can we use recursion to generate all possible strings?


**Similar Questions:**
1. [268. Missing Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000268-missing-number)
2. [448. Find All Numbers Disappeared in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000448-find-all-numbers-disappeared-in-an-array)
3. [710. Random Pick with Blacklist](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000710-random-pick-with-blacklist)



**Solution:**

We need to find a binary string of length `n` that does not appear in the given array `nums`. The solution leverages a clever approach based on Cantor's diagonal argument to efficiently construct such a string.

### Approach
The key idea is to construct a binary string where each bit is chosen such that it differs from the corresponding bit in each of the strings in `nums` at a specific position. Specifically, for the i-th position of the resulting string, we take the i-th bit of the i-th string in `nums` and flip it (0 becomes 1 and 1 becomes 0). This ensures that the resulting string will differ from every string in `nums` in at least one position, guaranteeing that it is not present in the array.

Let's implement this solution in PHP: **[1980. Find Unique Binary String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001980-find-unique-binary-string/solution.php)**

```php
<?php
/**
 * @param String[] $nums
 * @return String
 */
function findDifferentBinaryString($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = ["01", "10"];
echo findDifferentBinaryString($nums1) . "\n";

$nums2 = ["00", "01"];
echo findDifferentBinaryString($nums2) . "\n";

$nums3 = ["111", "011", "001"];
echo findDifferentBinaryString($nums3) . "\n";
?>
```

### Explanation:

1. **Initialization**: We start by determining the length `n` of the array `nums`.
2. **Constructing the Result String**: We iterate through each string in `nums`. For each i-th string, we look at the i-th character. We flip this character (0 becomes 1, and 1 becomes 0) and append the flipped character to the result string.
3. **Guarantee of Uniqueness**: By flipping the i-th character of the i-th string, we ensure that the resulting string will differ from each string in `nums` at the i-th position. This guarantees that the constructed string cannot be found in `nums`.

This approach efficiently constructs the required string in O(n) time complexity, where `n` is the length of the array `nums`, making it both optimal and straightforward.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**