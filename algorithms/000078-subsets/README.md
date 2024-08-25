78\. Subsets

**Difficulty:** Medium

**Topics:** `Array`, `Backtracking`, `Bit Manipulation`

Given an integer array `nums` of **unique** elements, return _all possible subsets[^1] (the power set)._

The solution set **must not** contain duplicate subsets. Return the solution in **any order**.

**Example 1:**

- **Input:** nums = [1,2,3]
- **Output:** [[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]

**Example 2:**

- **Input:** nums = [0]
- **Output:** [[],[0]] 


**Constraints:**

- <code>1 <= nums.length <= 10</code>
- <code>-10 <= nums[i] <= 10</code>
- All the numbers of `nums` are **unique**.

[^1]: **Subset** <code>A **subset** of an array is a selection of elements (possibly none) of the array.</code>

**Solution:**


To solve this problem, we can follow these steps:

Let's implement this solution in PHP: **[78. Subsets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000078-subsets/solution.php)**

```php
<?php
// Test the function with example inputs
print_r(subsets([1,2,3])); // Output: [[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]
print_r(subsets([0])); // Output: [[],[0]]
?>
```

### Explanation:

1. **Function Signature and Input**:
   - The function `subsets()` takes an array of integers `nums` as input and returns an array of arrays, where each inner array represents a subset of `nums`.
   - The return type is `Integer[][]`, meaning an array of arrays of integers.

2. **Initialization**:
   - `$ans = [[]];`: Initialize the result array `$ans` with an empty subset (`[]`). This is the base case where the subset is empty.

3. **Iterating Over Each Number**:
   - `foreach($nums as $num)`: Loop through each number in the input array `nums`. For each number `num`, you'll generate new subsets by adding `num` to each of the existing subsets.

4. **Generating New Subsets**:
   - `$ans_size = count($ans);`: Before modifying the `$ans` array, store its current size in `$ans_size`. This is necessary to prevent an infinite loop as new subsets are added.
   - `for($i = 0; $i < $ans_size; $i++)`: Iterate over the current subsets stored in `$ans` up to `$ans_size`.
      - `$cur = $ans[$i];`: Take the current subset.
      - `$cur[] = $num;`: Append the current number `num` to this subset.
      - `$ans[] = $cur;`: Add this new subset back into `$ans`.

5. **Return the Result**:
   - `return $ans;`: After processing all numbers in `nums`, return the final array of all possible subsets.

### Example Execution:

Let's go through an example to see how it works.

- **Input**: `$nums = [1, 2]`
- **Initial State**: `$ans = [[]]`

**Iteration 1 (`num = 1`)**:
- `$ans_size = 1`: (Because there's only one subset, `[]`)
- For `i = 0`:
   - `$cur = []`: Take the empty subset.
   - `$cur[] = 1`: Append `1` to it, resulting in `[1]`.
   - `$ans = [[], [1]]`: Add `[1]` to `$ans`.

**Iteration 2 (`num = 2`)**:
- `$ans_size = 2`: (Now there are two subsets: `[]` and `[1]`)
- For `i = 0`:
   - `$cur = []`: Take the empty subset.
   - `$cur[] = 2`: Append `2` to it, resulting in `[2]`.
   - `$ans = [[], [1], [2]]`: Add `[2]` to `$ans`.
- For `i = 1`:
   - `$cur = [1]`: Take the subset `[1]`.
   - `$cur[] = 2`: Append `2` to it, resulting in `[1, 2]`.
   - `$ans = [[], [1], [2], [1, 2]]`: Add `[1, 2]` to `$ans`.

**Final Result**:
- The function returns `[[], [1], [2], [1, 2]]`, which are all possible subsets of `[1, 2]`.

### Summary:

This function uses a dynamic approach to generate all subsets of an array by iteratively adding each element of the array to existing subsets. The time complexity is \(O(2^n)\), where \(n\) is the number of elements in the input array, because each element can either be included or excluded from each subset, resulting in \(2^n\) possible subsets.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**