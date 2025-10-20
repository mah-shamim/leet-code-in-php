2011\. Final Value of Variable After Performing Operations

**Difficulty:** Easy

**Topics:** `Array`, `String`, `Simulation`, `Weekly Contest 259`

There is a programming language with only **four** operations and **one** variable `X`:

- `++X` and `X++` **increments** the value of the variable `X` by `1`.
- `--X` and `X--` **decrements** the value of the variable `X` by `1`.

Initially, the value of `X` is `0`.

Given an array of strings `operations` containing a list of operations, return _the **final** value of `X` after performing all the operations_.

**Example 1:**

- **Input:** operations = ["--X","X++","X++"]
- **Output:** 1
- **Explanation:** The operations are performed as follows:
  Initially, X = 0.
  --X: X is decremented by 1, X =  0 - 1 = -1.
  X++: X is incremented by 1, X = -1 + 1 =  0.
  X++: X is incremented by 1, X =  0 + 1 =  1.

**Example 2:**

- **Input:** operations = ["++X","++X","X++"]
- **Output:** 3
- **Explanation:** The operations are performed as follows:
  Initially, X = 0.
  ++X: X is incremented by 1, X = 0 + 1 = 1.
  ++X: X is incremented by 1, X = 1 + 1 = 2.
  X++: X is incremented by 1, X = 2 + 1 = 3.

**Example 3:**

- **Input:** operations = ["X++","++X","--X","X--"]
- **Output:** 0
- **Explanation:** The operations are performed as follows:
  Initially, X = 0.
  X++: X is incremented by 1, X = 0 + 1 = 1.
  ++X: X is incremented by 1, X = 1 + 1 = 2.
  --X: X is decremented by 1, X = 2 - 1 = 1.
  X--: X is decremented by 1, X = 1 - 1 = 0.

**Constraints:**

- `1 <= operations.length <= 100`
- `operations[i]` will be either `"++X"`, `"X++"`, `"--X"`, or `"X--"`.



**Hint:**
1. There are only two operations to keep track of.
2. Use a variable to store the value after each operation.






**Solution:**

We need to determine the final value of a variable `X` after performing a series of operations. The operations can either increment or decrement the value of `X` by 1. The operations are given as an array of strings, each string being one of the following: `"++X"`, `"X++"`, `"--X"`, or `"X--"`. The initial value of `X` is `0`.

### Approach
1. **Initialization**: Start with `X` set to `0`.
2. **Operation Processing**: For each operation in the array, check whether it is an increment or decrement operation. This can be determined by examining the second character of each operation string. If the second character is `+`, it indicates an increment operation; if it is `-`, it indicates a decrement operation.
3. **Update Value**: Based on the type of operation, increment or decrement `X` accordingly.
4. **Return Result**: After processing all operations, return the final value of `X`.

Let's implement this solution in PHP: **[2011. Final Value of Variable After Performing Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002011-final-value-of-variable-after-performing-operations/solution.php)**

```php
<?php
/**
 * @param String[] $operations
 * @return Integer
 */
function finalValueAfterOperations($operations) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$operations1 = ["--X", "X++", "X++"];
echo "Output 1: " . finalValueAfterOperations($operations1) . "\n"; // Expected: 1

// Example 2
$operations2 = ["++X", "++X", "X++"];
echo "Output 2: " . finalValueAfterOperations($operations2) . "\n"; // Expected: 3

// Example 3
$operations3 = ["X++", "++X", "--X", "X--"];
echo "Output 3: " . finalValueAfterOperations($operations3) . "\n"; // Expected: 0
?>
```

### Explanation:

- **Initialization**: The variable `$x` is initialized to `0`.
- **Loop Through Operations**: For each operation string in the array, check the second character (at index 1). This character is either `+` or `-`, which directly indicates whether the operation increments or decrements `X`.
- **Increment/Decrement**: If the second character is `+`, increment `$x` by 1; otherwise, decrement `$x` by 1.
- **Return Result**: After processing all operations, the final value of `$x` is returned.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**