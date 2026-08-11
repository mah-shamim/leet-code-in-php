2996\. Smallest Missing Integer Greater Than Sequential Prefix Sum

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Sorting`, `Biweekly Contest 121`

You are given a **0-indexed** array of integers `nums`.

A prefix `nums[0..i]` is **sequential** if, for all `1 <= j <= i`, `nums[j] = nums[j - 1] + 1`. In particular, the prefix consisting only of `nums[0]` is **sequential**.

Return _the **smallest** integer `x` missing from `nums` such that `x` is greater than or equal to the sum of the **longest** sequential prefix_.

**Example 1:**

- **Input:** nums = [1,2,3,2,5]
- **Output:** 6
- **Explanation:** The longest sequential prefix of nums is [1,2,3] with a sum of 6. 6 is not in the array, therefore 6 is the smallest missing integer greater than or equal to the sum of the longest sequential prefix.

**Example 2:**

- **Input:** nums = [3,4,5,1,12,14,13]
- **Output:** 15
- **Explanation:** The longest sequential prefix of nums is [3,4,5] with a sum of 12. 12, 13, and 14 belong to the array while 15 does not. Therefore, 15 is the smallest missing integer greater than or equal to the sum of the longest sequential prefix.

**Example 3:**

- **Input:** nums = [5]
- **Output:** 6

**Example 4:**

- **Input:** nums = [2,3,4,5]
- **Output:** 14

**Example 5:**

- **Input:** nums = [10,11,12,20,21]
- **Output:** 33

**Example 6:**

- **Input:** nums = [1,2,4,3]
- **Output:** 5

**Constraints:**

- `1 <= nums.length <= 50`
- `1 <= nums[i] <= 50`


**Hint:**
1. To find the longest sequential prefix, iterate from left to right. For a fixed `i`, if `nums[i] != nums[i - 1] + 1` then the longest sequential prefix ends at `i - 1`.


**Similar Questions:**
1. [14. Longest Common Prefix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000014-longest-common-prefix)
2. [41. First Missing Positive](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000041-first-missing-positive)
3. [496. Next Greater Element I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000496-next-greater-element-i)


**Solution:**

We compute the longest prefix where each element is exactly one more than the previous. We sum that prefix. Then, starting from that sum, we keep incrementing until we find a number not present in the array, which is our answer.

## Approach

- **Step 1 – Find `longest` sequential prefix**
   - Start with the first element as the sum and prefix length as 1.
   - Iterate from index 1 onward while `nums[i] == nums[i-1] + 1`; add to sum and extend length.
   - Stop at the first break, as the problem asks for the *longest* sequential prefix.

- **Step 2 – Find the smallest missing integer `≥ sum`**
   - Store all array values in a hash set for `O(1)` lookups.
   - Initialize `candidate = sum`.
   - While candidate exists in the set, increment candidate.
   - Return the first candidate not in the set.

Let's implement this solution in PHP: **[2996. Smallest Missing Integer Greater Than Sequential Prefix Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002996-smallest-missing-integer-greater-than-sequential-prefix-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function missingInteger(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo missingInteger([1,2,3,2,5]) .  "\n";               // Output: 6
echo missingInteger([3,4,5,1,12,14,13]) .  "\n";        // Output: 15
echo missingInteger([5]) .  "\n";                       // Output: 6
echo missingInteger([2,3,4,5]) .  "\n";                 // Output: 14
echo missingInteger([10,11,12,20,21]) .  "\n";          // Output: 33
echo missingInteger([1,2,4,3]) .  "\n";                 // Output: 5
?>
```

### Explanation:

- **Prefix extraction**
   - The prefix must start at index 0 because it is defined as `nums[0..i]`.
   - We only extend while the consecutive difference is exactly 1.
   - Once the condition fails, we break – no need to check further because a longer sequential prefix cannot exist after a break.

- **Missing integer search**
   - Since we need the smallest missing integer *greater than or equal* to the sum, we begin checking from exactly that sum.
   - Using a hash set (from `array_flip`) makes membership tests constant time.
   - We increment until we find a value absent from the array – that value is guaranteed to be the answer.

- **Edge cases**
   - If the array is length 1, the sum is `nums[0]` and we check from there.
   - If the sum itself is missing, we return it immediately.
   - All numbers are positive and `≤ 50`, so the loop will terminate quickly.

## Complexity Analysis

- **Time complexity:** _**O(n)**_
   - _**O(n)**_ to find the prefix sum (at most one pass).
   - _**O(n)**_ to build the hash set.
   - The while loop increments at most `(max(nums) - sum + 1)` times, but in worst case with all numbers from sum to max present, it could go up to 50 – still `O(50)`, constant relative to` n ≤ 50`. So overall _**O(n)**_.

- **Space complexity:** _**O(n)**_ - We use a hash set of size up to `n`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**