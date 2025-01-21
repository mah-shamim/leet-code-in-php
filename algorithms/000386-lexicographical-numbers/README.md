386\. Lexicographical Numbers

**Difficulty:** Medium

**Topics:** `Depth-First Search`, `Trie`

Given an integer `n`, return _all the numbers in the range `[1, n]` sorted in lexicographical order_.

You must write an algorithm that runs in `O(n)` time and uses `O(1)` extra space.

**Example 1:**

- **Input:** n = 13
- **Output:** [1,10,11,12,13,2,3,4,5,6,7,8,9]

**Example 2:**

- **Input:** n = 2
- **Output:** 4
- **Explanation:** [1,2]



**Constraints:**

- <code>1 <= n <= 5 * 10<sup>4</sup></code>


**Solution:**

We can approach it using a Depth-First Search (DFS)-like strategy.

### Key Insights:
- Lexicographical order is essentially a pre-order traversal over a virtual n-ary tree, where the root node starts at `1`, and each node has up to 9 children, which are formed by appending digits (0 to 9).
- We can simulate this pre-order traversal by starting with `1` and repeatedly appending numbers, ensuring we don't exceed the given `n`.

### Approach:
1. Start with the number `1` and attempt to go deeper by multiplying by `10` (i.e., the next lexicographical number with the next digit).
2. If going deeper (multiplying by 10) is not possible (i.e., exceeds `n`), increment the number, ensuring that it doesn’t introduce an invalid jump across tens (i.e., going from `19` to `20`).
3. We backtrack when the current number cannot be extended further and move to the next valid number.
4. Continue until all numbers up to `n` are processed.

Let's implement this solution in PHP: **[386. Lexicographical Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000386-lexicographical-numbers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer[]
 */
function lexicalOrder($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$n1 = 13;
print_r(lexicalOrder($n1));

$n2 = 2;
print_r(lexicalOrder($n2));
?>
```

### Explanation:

- We maintain a current number and try to go as deep as possible by multiplying it by `10` to get the next lexicographical number.
- When we can't multiply (because it would exceed `n`), we increment the number. We handle cases where the increment leads to numbers like `20, 30, etc.`, by checking for trailing zeros and adjusting the current number accordingly.
- The loop continues until we've added all numbers up to `n` in lexicographical order.

### Example Walkthrough:
#### Input: `n = 13`
1. Start at `1`.
2. Multiply `1` by `10` -> `10`.
3. Add `11`, `12`, `13`.
4. Backtrack to `2` and continue incrementing up to `9`.

#### Output:
```php
[1, 10, 11, 12, 13, 2, 3, 4, 5, 6, 7, 8, 9]
```

#### Input: `n = 2`
1. Start at `1`.
2. Move to `2`.

#### Output:
```php
[1, 2]
```

### Time Complexity:
- `O(n)` since each number from `1` to `n` is processed exactly once.

### Space Complexity:
- `O(1)` extra space is used (disregarding the space used for the result array).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
