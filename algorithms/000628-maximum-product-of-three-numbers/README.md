628\. Maximum Product of Three Numbers

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Math`, `Sorting`

Given an integer array `nums`, _find three numbers whose product is maximum and return the maximum product_.

**Example 1:**

- **Input:** nums = [1,2,3]
- **Output:** 6

**Example 2:**

- **Input:** nums = [1,2,3,4]
- **Output:** 24

**Example 3:**

- **Input:** nums = [-1,-2,-3]
- **Output:** -6

**Example 4:**

- **Input:** nums = [-100, -98, 0, 1, 2]
- **Output:** 19600

**Example 5:**

- **Input:** nums = [-1, -2, -3, -4]
- **Output:** -6

**Example 6:**

- **Input:** nums = [-10, -10, 5, 2]
- **Output:** 500

**Example 7:**

- **Input:** nums = [-4, -3, -2, -1, 0, 60]
- **Output:** 700

**Example 8:**

- **Input:** nums = [-100, -98, 1, 2, 3]
- **Output:** 29400

**Example 9:**

- **Input:** nums = [-5, 1, 2, 3]
- **Output:** 6

**Example 10:**

- **Input:** nums = [-1000, -1000, 1000, 999]
- **Output:** 1000000000

**Example 11:**

- **Input:** nums = [2, 2, 2, 2]
- **Output:** 8

**Constraints:**

- `3 <= nums.length <= 10⁴`
- `-1000 <= nums[i] <= 1000`


**Similar Questions:**
1. [152. Maximum Product Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000152-maximum-product-subarray)
2. [3732. Maximum Product of Three Elements After One Replacement](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003732-maximum-product-of-three-elements-after-one-replacement)


**Solution:**

We solve this problem by recognizing that the maximum product of three numbers can come from either the three largest numbers or from the two smallest (most negative) numbers multiplied by the largest number. We sort the array to easily access these candidates and take the maximum of these two possible products.

## Approach

- Sort the input array in ascending order
- Identify two potential product candidates
- First candidate: product of the three largest numbers (last three elements after sorting)
- Second candidate: product of the two smallest numbers and the largest number (first two and last element)
- Return the maximum of these two candidates

Let's implement this solution in PHP: **[628. Maximum Product of Three Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000628-maximum-product-of-three-numbers/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumProduct(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumProduct([1, 2, 3]) .  "\n";                         // Output: 6
echo maximumProduct([1, 2, 3, 4]) .  "\n";                      // Output: 24
echo maximumProduct([-1, -2, -3]) .  "\n";                      // Output: -6
echo maximumProduct([-100, -98, 0, 1, 2]) .  "\n";              // Output: 19600
echo maximumProduct([-1, -2, -3, -4]) .  "\n";                  // Output: -6
echo maximumProduct([-10, -10, 5, 2]) .  "\n";                  // Output: 500
echo maximumProduct([-4, -3, -2, -1, 0, 60]) .  "\n";           // Output: 700
echo maximumProduct([-100, -98, 1, 2, 3]) .  "\n";              // Output: 29400
echo maximumProduct([-5, 1, 2, 3]) .  "\n";                     // Output: 6
echo maximumProduct([-1000, -1000, 1000, 999]) .  "\n";         // Output: 1000000000
echo maximumProduct([2, 2, 2, 2]) .  "\n";                      // Output: 8
?>
```

### Explanation:

- Sorting the array places negative numbers at the beginning and positive numbers at the end
- For arrays with all positive numbers: the three largest numbers always give maximum product
- For arrays with negative numbers: two large negative numbers multiplied together become positive, and when multiplied by the largest positive number, they could yield a larger product
- Example: `[-100, -98, 1, 2, 3]` → `(-100 × -98 × 3) = 29,400` vs `(1 × 2 × 3) = 6`, so the negative pair wins
- If all numbers are negative: the three largest (least negative) numbers give the maximum product
- If there are zeros or mixed signs: checking both candidates covers all possible maximum product scenarios

## Complexity Analysis

- **Time Complexity:** _**O(n log n)**_ where _**n**_ is the length of the array, due to the sorting operation
- **Space Complexity:** _**O(1)**_ as we only use a constant amount of extra space (or _**O(log n)**_ for sorting depending on implementation, but typically considered in-place sorting)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**