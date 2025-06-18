2966\. Divide Array Into Arrays With Max Difference

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sorting`

You are given an integer array `nums` of size `n` where `n` is a multiple of **3** and a positive integer `k`.

Divide the array `nums` into `n / 3` arrays of size **3** satisfying the following condition:

- The difference between **any** two elements in one array is **less than or equal** to `k`.

Return _a **2D** array containing the arrays. If it is impossible to satisfy the conditions_, return _an empty array_. And if there are multiple answers, return _**any** of them_.

**Example 1:**

- **Input:** nums = [1,3,4,8,7,9,3,5,1], k = 2
- **Output:** [[1,1,3],[3,4,5],[7,8,9]]
- **Explanation:** The difference between any two elements in each array is less than or equal to 2.

**Example 2:**

- **Input:** nums = [2,4,2,2,5,2], k = 2
- **Output:** []
  - **Explanation:**
  - Different ways to divide nums into 2 arrays of size 3 are:
    - [[2,2,2],[2,4,5]] (and its permutations)
    - [[2,2,4],[2,2,5]] (and its permutations)
  - Because there are four 2s there will be an array with the elements 2 and 5 no matter how we divide it. since 5 - 2 = 3 > k, the condition is not satisfied and so there is no valid division.

**Example 3:**

- **Input:** nums = [4,2,9,8,2,12,7,12,10,5,8,5,5,7,9,2,5,11], k = 14
- **Output:** [[2,2,12],[4,8,5],[5,9,7],[7,8,5],[5,9,10],[11,12,2]]
- **Explanation:** The difference between any two elements in each array is less than or equal to 14.

**Constraints:**

- `n == nums.length`
- <code>1 <= n <= 10<sup>5</sup></code>
- `n` is a multiple of 3
- <code>1 <= nums[i] <= 10<sup>5</sup></code>
- <code>1 <= k <= 10<sup>5</sup></code>


**Hint:**
1. Try to use a greedy approach.
2. Sort the array and try to group each `3` consecutive elements.






**Solution:**

We need to divide an integer array into multiple arrays of size 3 such that the difference between any two elements in each sub-array is less than or equal to a given integer `k`. If it's impossible to satisfy the conditions, we return an empty array.

### Approach
1. **Sorting the Array**: The first step is to sort the given array. Sorting helps in systematically grouping elements into triplets where the difference between the smallest and largest elements in each triplet can be easily checked.
2. **Consecutive Triplet Check**: After sorting, we iterate through the array in steps of three. For each group of three consecutive elements (starting from the smallest), we check if the difference between the third element (largest in the triplet) and the first element (smallest in the triplet) is less than or equal to `k`. If any triplet fails this condition, we immediately return an empty array.
3. **Constructing Result**: If all triplets satisfy the condition, we collect them into a 2D array and return it as the result.

This approach leverages the fact that sorting the array allows us to form triplets with the smallest possible differences between elements. By checking consecutive triplets, we ensure that any valid grouping will satisfy the condition, and if any triplet fails, no valid grouping exists.

Let's implement this solution in PHP: **[2966. Divide Array Into Arrays With Max Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002966-divide-array-into-arrays-with-max-difference/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer[][]
 */
function divideArray($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums = array(1,3,4,8,7,9,3,5,1);
$k = 2;
print_r(divideArray($nums, $k));

// Example 2
$nums = array(2,4,2,2,5,2);
$k = 2;
print_r(divideArray($nums, $k));

// Example 3
$nums = array(4,2,9,8,2,12,7,12,10,5,8,5,5,7,9,2,5,11);
$k = 14;
print_r(divideArray($nums, $k));
?>
```

### Explanation:

1. **Sorting the Array**: The array is sorted in ascending order to facilitate the grouping of elements into triplets where the elements are as close as possible in value.
2. **Checking Triplets**: For each group of three consecutive elements in the sorted array, we verify if the difference between the largest (element at position `i+2`) and smallest (element at position `i`) elements in the triplet is within the allowed difference `k`. If any triplet fails this check, the function returns an empty array immediately.
3. **Building Result**: If all triplets pass the check, they are added to the result array. Each triplet consists of three consecutive elements from the sorted array, ensuring the solution meets the problem's requirements efficiently.

This approach efficiently checks for valid groupings by leveraging sorting and a linear pass through the array, making it optimal with a time complexity dominated by the sorting step, O(n log n). The space complexity is O(n) to store the result triplets.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**