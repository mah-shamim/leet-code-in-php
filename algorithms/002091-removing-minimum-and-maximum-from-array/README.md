2091\. Removing Minimum and Maximum From Array

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Greedy`, `Weekly Contest 269`

You are given a **0-indexed** array of **distinct** integers `nums`.

There is an element in `nums` that has the **lowest** value and an element that has the **highest** value. We call them the **minimum** and **maximum** respectively. Your goal is to remove **both** these elements from the array.

A **deletion** is defined as either removing an element from the front of the array or removing an element from the **back** of the array.

Return _the **minimum** number of deletions it would take to remove **both** the minimum and maximum element from the array_.

**Example 1:**

- **Input:** nums = [2,<ins>**10**</ins>,7,5,4,<ins>**1**</ins>,8,6]
- **Output:** 5
- **Explanation:**
  - The minimum element in the array is nums[5], which is 1.
  - The maximum element in the array is nums[1], which is 10.
  - We can remove both the minimum and maximum by removing 2 elements from the front and 3 elements from the back.
  - This results in 2 + 3 = 5 deletions, which is the minimum number possible.

**Example 2:**

- **Input:** nums = [0,<ins>**-4**</ins>,<ins>**19**</ins>,1,8,-2,-3,5]
- **Output:** 3
- **Explanation:**
  - The minimum element in the array is nums[1], which is -4.
  - The maximum element in the array is nums[2], which is 19.
  - We can remove both the minimum and maximum by removing 3 elements from the front.
  - This results in only 3 deletions, which is the minimum number possible.

**Example 3:**

- **Input:** nums = [<ins>**101**</ins>]
- **Output:** 1
- **Explanation:**  
  - There is only one element in the array, which makes it both the minimum and maximum element.
  - We can remove it with 1 deletion.

**Example 4:**

- **Input:** nums = [1, 2, 3]
- **Output:** 3

**Example 5:**

- **Input:** nums = [3, 2, 1]
- **Output:** 3

**Example 6:**

- **Input:** nums = [5, 1, 4, 2, 3]
- **Output:** 1

**Example 7:**

- **Input:** nums = [-10, 5, -1, 10]
- **Output:** 4

**Example 8:**

- **Input:** nums = [100, -100, 0]
- **Output:** 2

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `-10⁵ <= nums[i] <= 10⁵`
- The integers in `nums` are **distinct**.


**Hint:**
1. There can only be three scenarios for deletions such that both minimum and maximum elements are removed:
2. Scenario 1: Both elements are removed by only deleting from the front.
3. Scenario 2: Both elements are removed by only deleting from the back.
4. Scenario 3: Delete from the front to remove one of the elements, and delete from the back to remove the other element.
5. Compare which of the three scenarios results in the minimum number of moves.


**Similar Questions:**
1. [1423. Maximum Points You Can Obtain from Cards](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001423-maximum-points-you-can-obtain-from-cards)
2. [1647. Minimum Deletions to Make Character Frequencies Unique](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001647-minimum-deletions-to-make-character-frequencies-unique)


**Solution:**

We analyzed the problem and determined that the optimal strategy always falls into one of three possible deletion scenarios. By identifying the positions of the minimum and maximum elements, we can compute the cost of each scenario and return the smallest.

## Approach

- Find the indices of the minimum and maximum values in the array.
- Since the array contains distinct integers, these indices are unique.
- Consider three possible ways to delete both elements:
   1. Delete only from the front.
   2. Delete only from the back.
   3. Delete one from the front and the other from the back.
- Compute the number of deletions required for each scenario.
- Return the minimum among the three.


Let's implement this solution in PHP: **[2091. Removing Minimum and Maximum From Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002091-removing-minimum-and-maximum-from-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumDeletions(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumDeletions([2, 10, 7, 5, 4, 1, 8, 6]) .  "\n";           // Output: 5
echo minimumDeletions([0, -4, 19, 1, 8, -2, -3, 5]) .  "\n";        // Output: 3
echo minimumDeletions([101]) .  "\n";                               // Output: 1
echo minimumDeletions([1, 2, 3]) .  "\n";                           // Output: 3
echo minimumDeletions([3, 2, 1]) .  "\n";                           // Output: 3
echo minimumDeletions([5, 1, 4, 2, 3]) .  "\n";                     // Output: 1
echo minimumDeletions([-10, 5, -1, 10]) .  "\n";                    // Output: 4
echo minimumDeletions([100, -100, 0]) .  "\n";                      // Output: 2
?>
```

### Explanation:

- **Find min and max indices:** Traverse the array once to locate the positions of the smallest and largest values.
- **Order indices:** Let `left = min(minIdx, maxIdx)` and `right = max(minIdx, maxIdx)` for easier calculations.
- **Scenario 1 – Delete from front only:** The farther element from the front is at `max(left, right)`, so deletions needed = `max(left, right) + 1`.
- **Scenario 2 – Delete from back only:** The farther element from the back is at `min(left, right)`, so deletions needed = `n - min(left, right)`.
- **Scenario 3 – Delete one from front and one from back:**  
  - Remove the left element from front: `left + 1` deletions.  
  - Remove the right element from back: `n - right` deletions.  
  - Total = `(left + 1) + (n - right)`.
- **Edge case:** If there is only one element, it is both min and max, and we remove it with 1 deletion.

## Complexity Analysis

- **Time Complexity:** _**O(n)**_ — single traversal to find min and max indices.
- **Space Complexity:** _**O(1)**_ — only a few integer variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**