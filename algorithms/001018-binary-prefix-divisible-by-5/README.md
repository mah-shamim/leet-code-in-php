1018\. Binary Prefix Divisible By 5

**Difficulty:** Easy

**Topics:** `Array`, `Bit Manipulation`, `Weekly Contest 130`

You are given a binary array `nums` (**0-indexed**).

We define `xᵢ` as the number whose binary representation is the subarray `nums[0..i]` (from most-significant-bit to least-significant-bit).

- For example, if `nums = [1,0,1]`, then `x₀ = 1`, `x₁ = 2`, and `x₂ = 5`.

Return _an array of booleans `answer` where `answer[i]` is true if `xᵢ` is divisible by `5`_.

**Example 1:**

- **Input:** nums = [0,1,1]
- **Output:** [true,false,false]
- **Explanation:** The input numbers in binary are 0, 01, 011; which are 0, 1, and 3 in base-10.
  Only the first number is divisible by 5, so answer[0] is true.

**Example 2:**

- **Input:** nums = [1,1,1]
- **Output:** [false,false,false]

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `nums[i] is either 0 or 1.`



**Hint:**
1. If `X` is the first `i` digits of the array as a binary number, then `2X + A[i]` is the first `i+1` digits.



**Similar Questions:**
1. [2455. Average Value of Even Numbers That Are Divisible by Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002455-average-value-of-even-numbers-that-are-divisible-by-three)
2. [2644. Find the Maximum Divisibility Score](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002644-find-the-maximum-divisibility-score)






**Solution:**

We cannot directly convert the binary number to an integer due to potential overflow issues. Instead, we use modular arithmetic to efficiently compute the remainder when the number is divided by 5 at each step.

### Approach
1. **Modular Arithmetic**: The key insight is that for any number formed by the first `i` bits, the number formed by the first `i+1` bits can be expressed as `(current_value * 2 + next_bit)`. By taking the modulo 5 of this value at each step, we keep the current value manageable and within a small range (0 to 4).
2. **Iterative Calculation**: Traverse the binary array, updating the current value using the formula `current = (current * 2 + bit) % 5`. This ensures that we only track the remainder when divided by 5, which is sufficient to check divisibility.
3. **Check Divisibility**: After updating the current value for each bit, check if the current value modulo 5 is zero. If it is, mark the position as `true` in the result array; otherwise, mark it as `false`.

Let's implement this solution in PHP: **[1018. Binary Prefix Divisible By 5](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001018-binary-prefix-divisible-by-5/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Boolean[]
 */
function prefixesDivBy5($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo prefixesDivBy5([0,1,1]) . "\n";    // Output: [true,false,false]
echo prefixesDivBy5([1,1,1]) . "\n";    // Output: [false,false,false]
?>
```

### Explanation:

1. **Initialization**: Start with `current = 0`, which represents the initial value of the binary number formed.
2. **Processing Each Bit**: For each bit in the array, update `current` using the formula `(current * 2 + bit) % 5`. This formula effectively builds the binary number step by step while keeping the value within bounds by leveraging modulo operation.
3. **Result Construction**: For each updated `current` value, check if it is zero (indicating divisibility by 5) and store the result in the output array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**