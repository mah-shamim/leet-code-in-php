3289\. The Two Sneaky Numbers of Digitville

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Math`, `Weekly Contest 415`

In the town of Digitville, there was a list of numbers called `nums` containing integers from `0` to `n - 1`. Each number was supposed to appear **exactly once** in the list, however, **two** mischievous numbers sneaked in an _additional time_, making the list longer than usual.

As the town detective, your task is to find these two sneaky numbers. Return an array of size **two** containing the two numbers (in _any order_), so peace can return to Digitville.

**Example 1:**

- **Input:** nums = [0,1,1,0]
- **Output:** [0,1]
- **Explanation:** The numbers 0 and 1 each appear twice in the array.

**Example 2:**

- **Input:** nums = [0,3,2,1,3,2]
- **Output:** [2,3]
- **Explanation:** The numbers 2 and 3 each appear twice in the array.

**Example 3:**

- **Input:** nums = [7,1,5,4,3,4,6,0,9,5,8,2]
- **Output:** [4,5]
- **Explanation:** The numbers 4 and 5 each appear twice in the array.

**Constraints:**

- `2 <= n <= 100`
- `nums.length == n + 2`
- `0 <= nums[i] < n`
- The input is generated such that `nums` contains **exactly** two repeated elements.




**Hint:**
1. To solve the problem without the extra space, we need to think about how many times each number occurs in relation to the index.



**Similar Questions:**
1. [442. Find All Duplicates in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000442-find-all-duplicates-in-an-array)






**Solution:**

We need to find the two numbers that appear twice in an array that should contain each number from 0 to n-1 exactly once.

Let me analyze the approaches:

**Approach 1: Using a Frequency Array**
- Create an array to count occurrences of each number
- Find which numbers appear twice
- Time Complexity: O(n), Space Complexity: O(n)

**Approach 2: Using Sum and Mathematical Properties**
- Calculate expected sum vs actual sum
- Calculate expected sum of squares vs actual sum of squares
- Solve the system of equations to find the two numbers
- Time Complexity: O(n), Space Complexity: O(1)

**Approach 3: Using Sorting**
- Sort the array and find duplicates
- Time Complexity: O(n log n), Space Complexity: O(1) or O(n)

Let's implement this solution in PHP: **[3289. The Two Sneaky Numbers of Digitville](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003289-the-two-sneaky-numbers-of-digitville/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function getSneakyNumbers($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums = [0, 1, 1, 0];
print_r(getSneakyNumbers($nums)); // [0, 1]

// Example 2
$nums = [0, 3, 2, 1, 3, 2];
print_r(getSneakyNumbers($nums)); // [2, 3]

// Example 3
$nums = [7, 1, 5, 4, 3, 4, 6, 0, 9, 5, 8, 2];
print_r(getSneakyNumbers($nums)); // [4, 5]
?>
```

### Explanation:

1. First, I calculate `n` by subtracting 2 from the length of `nums` (since the array has 2 extra elements)
2. I create a frequency array `$freq` initialized with zeros, with size `n`
3. I iterate through `$nums` and count occurrences of each number
4. I then iterate through the frequency array and find all numbers that appear exactly twice
5. These numbers are added to the result array and returned

**Example walkthrough with nums = [0,1,1,0]:**
- `n = 4 - 2 = 2`
- Frequency array starts as `[0, 0]`
- After counting: `[2, 2]` (0 appears twice, 1 appears twice)
- Both 0 and 1 are added to result: `[0, 1]`

This solution is efficient with O(n) time complexity and O(n) space complexity, which is optimal for the given constraints (n ≤ 100).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**