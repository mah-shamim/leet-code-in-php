1718\. Construct the Lexicographically Largest Valid Sequence

**Difficulty:** Medium

**Topics:** `Array`, `Backtracking`

Given an integer `n`, find a sequence that satisfies all of the following:

- The integer `1` occurs once in the sequence.
- Each integer between `2` and `n` occurs twice in the sequence.
- For every integer `i` between `2` and `n`, the **distance** between the two occurrences of `i` is exactly `i`.

The **distance** between two numbers on the sequence, `a[i]` and `a[j]`, is the absolute difference of their indices, `|j - i|`.

Return _the **lexicographically largest** sequence. It is guaranteed that under the given constraints, there is always a solution_.

A sequence `a` is lexicographically larger than a sequence `b` (of the same length) if in the first position where `a` and `b` differ, sequence `a` has a number greater than the corresponding number in `b`. For example, `[0,1,9,0]` is lexicographically larger than `[0,1,5,6]` because the first position they differ is at the third number, and `9` is greater than `5`.

**Example 1:**

- **Input:** n = 3
- **Output:** [3,1,2,3,2]
- **Explanation:** [2,3,2,1,3] is also a valid sequence, but [3,1,2,3,2] is the lexicographically largest valid sequence.

**Example 2:**

- **Input:** n = 5
- **Output:** [5,3,1,4,3,5,2,4,2]



**Constraints:**

- `1 <= n <= 20`


**Hint:**
1. Heuristic algorithm may work.



**Solution:**

We need to construct the lexicographically largest valid sequence that satisfies specific constraints. The sequence must include the integer 1 once and each integer from 2 to n exactly twice, with the distance between their occurrences equal to their value.

### Approach
The approach uses a backtracking algorithm to build the sequence step-by-step, ensuring that each number is placed in the highest possible position to achieve the lexicographically largest sequence. The key steps are:

1. **Track Usage and Reservations**: Use arrays to track which numbers have been used and their positions, and which positions are reserved for subsequent occurrences of a number.
2. **Backtracking**: Recursively attempt to place each number starting from the largest possible value (n) down to 1. This ensures that the lexicographically largest sequence is found first.
3. **Reserve Positions**: When placing the first occurrence of a number, reserve the position where the second occurrence must be placed. This ensures the correct distance between the two occurrences.

Let's implement this solution in PHP: **[1718. Construct the Lexicographically Largest Valid Sequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001718-construct-the-lexicographically-largest-valid-sequence/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer[]
 */
function constructDistancedSequence($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $current_pos
 * @param $sequence
 * @param $used
 * @param $reserved
 * @param $n
 * @return bool
 */
function backtrack($current_pos, &$sequence, &$used, &$reserved, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(constructDistancedSequence(3));
print_r(constructDistancedSequence(5));
?>
```

### Explanation:

1. **Initialization**: The `constructLargestValidSequence` function initializes the necessary arrays and starts the backtracking process from position 0.
2. **Backtracking Function**: The `backtrack` function handles placing numbers in the sequence:
   - If the current position is reserved, it places the required number and checks if the rest of the sequence can be filled.
   - If not reserved, it tries placing numbers from n down to 1, ensuring the largest possible number is placed first.
   - For each number, it checks if the next occurrence can be placed at the correct reserved position, ensuring the distance constraint is met.

This approach efficiently explores possible sequences while ensuring the lexicographically largest valid sequence is found first.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**