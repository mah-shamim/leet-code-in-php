3397\. Maximum Number of Distinct Elements After Operations

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sorting`, `Weekly Contest 429`

You are given an integer array `nums` and an integer `k`.

You are allowed to perform the following **operation** on each element of the array **at most** once:

- Add an integer in the range `[-k, k]` to the element.

Return _the **maximum** possible number of **distinct** elements in `nums` after performing the **operations**_.

**Example 1:**

- **Input:** nums = [1,2,2,3,3,4], k = 2
- **Output:** 6
- **Explanation:** `nums` changes to `[-1, 0, 1, 2, 3, 4]` after performing operations on the first four elements.

**Example 2:**

- **Input:** nums = [4,4,4,4], k = 1
- **Output:** 3
- **Explanation:** By adding -1 to `nums[0]` and 1 to `nums[1]`, `nums` changes to `[3, 5, 4, 4]`.

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `0 <= k <= 10⁹`



**Hint:**
1. Can we use sorting here?
2. Find the minimum element which is not used for each element.



**Similar Questions:**
1. [1481. Least Number of Unique Integers after K Removals](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001481-least-number-of-unique-integers-after-k-removals)






**Solution:**

We need to find the maximum number of distinct elements after being allowed to add any integer in the range `[-k, k]` to each element at most once.

The key insight is that for each number, we can transform it to any value in the range `[num-k, num+k]`. To maximize distinct elements, we should assign the smallest possible distinct value to each number while ensuring it stays within its allowed range.

**Approach:**
1. Sort the array to process numbers in order
2. For each number, try to assign the smallest possible value that:
   - Is greater than the previously assigned value
   - Is within the number's allowed range `[num-k, num+k]`
3. Keep track of the last assigned value and count how many distinct values we can assign

Let's implement this solution in PHP: **[3397. Maximum Number of Distinct Elements After Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003397-maximum-number-of-distinct-elements-after-operations/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maxDistinctElements($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = array(1,2,2,3,3,4);
$k1 = 2;
echo "Output 1: " . maxDistinctElements($nums1, $k1) . "\n"; // Expected: 6

$nums2 = array(4,4,4,4);
$k2 = 1;
echo "Output 2: " . maxDistinctElements($nums2, $k2) . "\n"; // Expected: 3
?>
```

### Explanation:

- **Sorting:** We sort the array to process numbers from smallest to largest, which helps us systematically assign the smallest possible distinct values.
- **Minimum Candidate:** For each number, we calculate the smallest value we can assign that maintains distinctness (`lastAssigned + 1`) while staying within the allowed range (`num - k`).
- **Validation:** We check if this candidate value is within the upper bound (`num + k`). If yes, we assign it and increment our count.
- **Tracking:** We keep track of the last assigned value to ensure all assigned values are distinct.

**Examples:**
- `nums = [1,2,2,3,3,4], k = 2`: We can assign `[-1, 0, 1, 2, 3, 4]` giving 6 distinct elements
- `nums = [4,4,4,4], k = 1`: We can assign `[3, 4, 5]` giving 3 distinct elements

**Complexity:**
- **Time:** O(n log n) due to sorting
- **Space:** O(1) excluding the space used by sorting

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**