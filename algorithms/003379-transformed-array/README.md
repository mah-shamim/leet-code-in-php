3379\. Transformed Array

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Simulation`, `Weekly Contest 427`

You are given an integer array `nums` that represents a circular array. Your task is to create a new array `result` of the **same** size, following these rules:
For each index `i` (where `0 <= i < nums.length`), perform the following **independent** actions:
- If `nums[i] > 0`: Start at index `i` and move `nums[i]` steps to the **right** in the circular array. Set `result[i]` to the value of the index where you land.
- If `nums[i] < 0`: Start at index `i` and move `abs(nums[i])` steps to the **left** in the circular array. Set `result[i]` to the value of the index where you land.
- If `nums[i] == 0`: Set `result[i]` to `nums[i]`.

Return _the new array `result`_.

**Note:** Since `nums` is circular, moving past the last element wraps around to the beginning, and moving before the first element wraps back to the end.

**Example 1:**

- **Input:** nums = [3,-2,1,1]
- **Output:** [1,1,1,3]
- **Explanation:**
  - For `nums[0]` that is equal to 3, If we move 3 steps to right, we reach `nums[3]`. So `result[0]` should be 1.
  - For `nums[1]` that is equal to -2, If we move 2 steps to left, we reach `nums[3]`. So `result[1]` should be 1.
  - For `nums[2]` that is equal to 1, If we move 1 step to right, we reach `nums[3]`. So `result[2]` should be 1.
  - For `nums[3]` that is equal to 1, If we move 1 step to right, we reach `nums[0]`. So `result[3]` should be 3.


**Example 2:**

- **Input:** nums = [-1,4,-1]
- **Output:** [-1,-1,4]
- **Explanation:**
  - For `nums[0]` that is equal to -1, If we move 1 step to left, we reach `nums[2]`. So `result[0]` should be -1.
  - For `nums[1]` that is equal to 4, If we move 4 steps to right, we reach `nums[2]`. So `result[1]` should be -1.
  - For `nums[2]` that is equal to -1, If we move 1 step to left, we reach `nums[1]`. So `result[2]` should be 4.


**Constraints:**

- `1 <= nums.length <= 100`
- `-100 <= nums[i] <= 100`



**Hint:**
1. Simulate the operations as described in the statement






**Solution:**

We need to simulate the movement through a circular array and create a transformed result. Here’s the plan:

### Approach:

For each element in the input array:
- If positive: move right `nums[i]` steps (wrapping around using modulo)
- If negative: move left `abs(nums[i])` steps (wrapping around using modulo)
- If zero: keep zero

The key is handling the circular nature with proper modulo arithmetic, especially for negative movements.

Let's implement this solution in PHP: **[3379. Transformed Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003379-transformed-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function constructTransformedArray(array $nums): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo constructTransformedArray([3, -2, 1, 1]) . "\n";           // Output: [1,1,1,3]
echo constructTransformedArray([-1, 4, -1]) . "\n";             // Output: [-1,-1,4]
?>
```

### Explanation:

1. **Array Length**: Store the length of the array for modulo operations
2. **Result Array**: Initialize an array of the same size
3. **Iterate**: Process each element individually
4. **Zero Case**: If element is 0, set result to 0
5. **Positive Case**: Move right using modulo to handle wrap-around
6. **Negative Case**: Move left, ensuring the index stays positive by adding array length if negative

### Complexity
- **Time Complexity**: **_O(n)_** where n is the length of the array
- **Space Complexity**: **_O(n)_** for the result array

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**