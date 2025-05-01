1509\. Minimum Difference Between Largest and Smallest Value in Three Moves

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sorting`

You are given an integer array `nums`.

In one move, you can choose one element of `nums` and change it to **any value**.

Return _the minimum difference between the largest and smallest value of `nums` **after performing at most three moves**_.

**Example 1:**

- **Input:** nums = [5,3,2,4]
- **Output:** 0
- **Explanation:** We can make at most 3 moves.\
  In the first move, change 2 to 3. nums becomes [5,3,3,4].\
  In the second move, change 4 to 3. nums becomes [5,3,3,3].\
  In the third move, change 5 to 3. nums becomes [3,3,3,3].\
  After performing 3 moves, the difference between the minimum and maximum is 3 - 3 = 0.

**Example 2:**

- **Input:** nums = [1,5,0,10,14]
- **Output:** 1
- **Explanation:** We can make at most 3 moves.\
  In the first move, change 5 to 0. nums becomes [1,0,0,10,14].\
  In the second move, change 10 to 0. nums becomes [1,0,0,0,14].\
  In the third move, change 14 to 1. nums becomes [1,0,0,0,1].\
  After performing 3 moves, the difference between the minimum and maximum is 1 - 0 = 1.\
  It can be shown that there is no way to make the difference 0 in 3 moves.

**Example 3:**

- **Input:** nums = [3,100,20]
- **Output:** 0
- **Explanation:** We can make at most 3 moves.\
  In the first move, change 100 to 7. nums becomes [3,7,20].\
  In the second move, change 20 to 7. nums becomes [3,7,7].\
  In the third move, change 3 to 7. nums becomes [7,7,7].\
  After performing 3 moves, the difference between the minimum and maximum is 7 - 7 = 0.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>-10<sup>9</sup> <= nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. The minimum difference possible is obtained by removing three elements between the three smallest and three largest values in the array.



**Solution:**

In this problem, we are given an integer array `nums`. The goal is to find the minimum difference between the largest and smallest values of the array after performing at most three moves. In each move, we can change one element of the array to any value. This problem focuses on minimizing the difference between the maximum and minimum values by making strategic modifications.

### Key Points

1. **At most three moves:** We are allowed to make three changes to the array, which means we can either remove or alter three elements to minimize the difference between the largest and smallest values.

2. **Optimization:** Instead of brute-forcing all possible combinations of values to change, we can simplify the task by sorting the array and making the best moves based on the positions of the largest and smallest elements.

3. **Sorting approach:** Sorting the array allows us to easily compute the difference between the maximum and minimum values after removing certain elements from either end of the array.

### Approach

1. **Sort the Array:** Sorting the array enables us to easily pick the smallest and largest elements. After sorting, we can directly consider changing the smallest and largest values.

2. **Key observation:** Since we can change three elements, we want to remove or replace up to three values from the smallest and largest parts of the array. We need to consider four possible scenarios after making the changes:
  - Removing the three smallest values (keeping the largest values).
  - Removing two smallest values and one largest value.
  - Removing one smallest value and two largest values.
  - Removing the three largest values (keeping the smallest values).

3. **Calculate the Differences:** For each of the four scenarios, calculate the difference between the new largest and smallest values. The minimum of these differences will be the answer.

### Plan

1. **Step 1:** Sort the array to make it easier to find the largest and smallest elements.

2. **Step 2:** Calculate the difference for each of the four possible cases where we remove 0, 1, 2, or 3 elements from the smallest or largest part of the array.

3. **Step 3:** Return the minimum of these differences.

Let's implement this solution in PHP: **[1509. Minimum Difference Between Largest and Smallest Value in Three Moves](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001509-minimum-difference-between-largest-and-smallest-value-in-three-moves/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minDifference($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [5,3,2,4];
$nums2 = [1,5,0,10,14];
$nums3 = [3,100,20];

echo minDifference($nums1) . "\n"; // Output: 0
echo minDifference($nums2) . "\n"; // Output: 1
echo minDifference($nums3) . "\n"; // Output: 0
?>
```

### Explanation:

We perform the following steps to solve the problem:

1. **Handle Edge Case:** If the array has 4 or fewer elements, we can change all but one element to make the difference 0. Hence, return 0 immediately in such cases.

2. **Sort the Array:** Sorting the array helps us to easily access the smallest and largest elements.

3. **Compute Differences:** We consider removing elements from the start or end of the array, and compute the difference in each case:
  - Remove 3 from the start: Difference between the largest (`nums[n-1]`) and the fourth smallest (`nums[3]`).
  - Remove 2 from the start, 1 from the end: Difference between the second largest (`nums[n-2]`) and the third smallest (`nums[2]`).
  - Remove 1 from the start, 2 from the end: Difference between the third largest (`nums[n-3]`) and the second smallest (`nums[1]`).
  - Remove 3 from the end: Difference between the fourth largest (`nums[n-4]`) and the smallest (`nums[0]`).

4. **Return the Minimum:** The minimum of these four differences gives us the answer.

### Example Walkthrough

**Example 1:**
- **Input:** `nums = [5, 3, 2, 4]`
- **Sorted:** `nums = [2, 3, 4, 5]`
- We can make three moves:
  - Remove 3 from the start: `5 - 3 = 2`
  - Remove 2 from the start, 1 from the end: `4 - 3 = 1`
  - Remove 1 from the start, 2 from the end: `4 - 2 = 2`
  - Remove 3 from the end: `4 - 2 = 2`
- **Minimum difference:** 0

**Example 2:**
- **Input:** `nums = [1, 5, 0, 10, 14]`
- **Sorted:** `nums = [0, 1, 5, 10, 14]`
- We can make three moves:
  - Remove 3 from the start: `14 - 3 = 11`
  - Remove 2 from the start, 1 from the end: `10 - 3 = 7`
  - Remove 1 from the start, 2 from the end: `10 - 1 = 9`
  - Remove 3 from the end: `10 - 0 = 10`
- **Minimum difference:** 1

**Example 3:**
- **Input:** `nums = [3, 100, 20]`
- **Sorted:** `nums = [3, 20, 100]`
- We can make three moves:
  - Remove 3 from the start: `100 - 7 = 93`
  - Remove 2 from the start, 1 from the end: `7 - 7 = 0`
- **Minimum difference:** 0

### Time Complexity

- Sorting the array takes `O(n log n)` where `n` is the length of the array.
- Calculating the differences takes constant time `O(1)` since we only consider four possible cases.
- **Overall Time Complexity:** `O(n log n)`

### Output for Example

**Example 1:**
- **Input:** `nums = [5, 3, 2, 4]`
- **Output:** `0`

**Example 2:**
- **Input:** `nums = [1, 5, 0, 10, 14]`
- **Output:** `1`

**Example 3:**
- **Input:** `nums = [3, 100, 20]`
- **Output:** `0`

This approach efficiently computes the minimum difference between the largest and smallest values after at most three moves by leveraging sorting and considering only four possible changes to the array. It handles edge cases and provides the result in `O(n log n)` time complexity, which is optimal for the input size constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**