3577\. Count the Number of Computer Unlocking Permutations

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Brainteaser`, `Combinatorics`, `Weekly Contest 453`

You are given an array `complexity` of length `n`.

There are `n` **locked** computers in a room with labels from 0 to `n - 1`, each with its own **unique** password. The password of the computer `i` has a complexity `complexity[i]`.

The password for the computer labeled 0 is **already** decrypted and serves as the root. All other computers must be unlocked using it or another previously unlocked computer, following this information:

- You can decrypt the password for the computer `i` using the password for computer `j`, where `j` is **any** integer less than `i` with a lower complexity. (i.e. `j < i` and `complexity[j] < complexity[i]`)
- To decrypt the password for computer `i`, you must have already unlocked a computer `j` such that `j < i` and `complexity[j] < complexity[i]`.

Find the number of permutations[^1] of `[0, 1, 2, ..., (n - 1)]` that represent a valid order in which the computers can be unlocked, starting from computer 0 as the only initially unlocked one.

Since the answer may be large, return it **modulo** `10⁹ + 7`.

**Note** that the password for the computer **with label** 0 is decrypted, and not the computer with the first position in the permutation.

**Example 1:**

- **Input:** complexity = [1,2,3]
- **Output:** 2
- **Explanation:** The valid permutations are:
  - [0, 1, 2]
    - Unlock computer 0 first with root password.
    - Unlock computer 1 with password of computer 0 since `complexity[0] < complexity[1]`.
    - Unlock computer 2 with password of computer 1 since `complexity[1] < complexity[2]`.
  - [0, 2, 1]
    - Unlock computer 0 first with root password.
    - Unlock computer 2 with password of computer 0 since `complexity[0] < complexity[2]`. 
    - Unlock computer 1 with password of computer 0 since `complexity[0] < complexity[1]`.


**Example 2:**

- **Input:** complexity = [3,3,3,4,4,4]
- **Output:** 0
- **Explanation:** There are no possible permutations which can unlock all computers.

**Constraints:**

- `2 <= complexity.length <= 10⁵`
- `1 <= complexity[i] <= 10⁹`



**Hint:**
1. Ensure that the element at index 0 has the unique minimum complexity (no other element can match its value).
2. Fix index 0 as the first in the unlocking order.
3. The remaining indices from `1` to `n - 1` can then be arranged arbitrarily, yielding `factorial(n - 1)` possible orders.



**Similar Questions:**
1. [1006. Clumsy Factorial](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001006-clumsy-factorial)


[^1]: **Permutation:** A permutation is a rearrangement of all the elements of an array.



**Solution:**

We are given an array complexity of length n. There are n locked computers labeled 0 to n-1, each with a unique password and a complexity value. The password for computer 0 is already decrypted (root). We can decrypt computer i using computer j if j < i and complexity[j] < complexity[i]. We must have already unlocked computer j.

### Approach:

- Check if computer 0 has the unique minimum complexity in the array
- If any other computer has complexity ≤ computer 0's complexity, return 0 (no valid permutations exist)
- Otherwise, computer 0 can unlock all other computers directly or indirectly
- The remaining n-1 computers can be unlocked in any order, giving (n-1)! permutations
- Compute (n-1)! modulo 10⁹+7

Let's implement this solution in PHP: **[3577. Count the Number of Computer Unlocking Permutations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003577-count-the-number-of-computer-unlocking-permutations/solution.php)**

```php
<?php
/**
 * @param Integer[] $complexity
 * @return Integer
 */
function countPermutations($complexity) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countPermutations([1,2,3]) . "\n";             // Output: 2
echo countPermutations([3,3,3,4,4,4]) . "\n";       // Output: 0
?>
```

### Explanation:

- Computer 0 must have strictly lower complexity than all other computers:
   - If another computer has ≤ complexity[0], it cannot be unlocked because:
      - To unlock computer i, we need j < i AND complexity[j] < complexity[i]
      - Computer 0 is the only computer with index < i for i > 0
      - If complexity[0] ≥ complexity[i], condition fails
- Since computer 0 has unique minimum complexity:
   - For any computer i > 0, computer 0 satisfies both conditions (0 < i AND complexity[0] < complexity[i])
   - Once computer 0 is unlocked, it can directly unlock any other computer
   - The unlocking order of computers 1 through n-1 doesn't matter
- Therefore, all (n-1)! permutations of the remaining computers are valid
- The permutation must start with 0, then any arrangement of the remaining computers

## Complexity Analysis
- **Time Complexity:** O(n) - single pass to check min, then factorial computation
- **Space Complexity:** O(1) - constant extra space

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**