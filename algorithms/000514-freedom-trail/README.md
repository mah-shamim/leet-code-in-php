514\. Freedom Trail

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Depth-First Search`, `Breadth-First Search`

In the video game Fallout 4, the quest **"Road to Freedom"** requires players to reach a metal dial called the **"Freedom Trail Ring"** and use the dial to spell a specific keyword to open the door.

Given a string `ring` that represents the code engraved on the outer ring and another string `key` that represents the keyword that needs to be spelled, return _the minimum number of steps to spell all the characters in the keyword_.

Initially, the first character of the ring is aligned at the `"12:00"` direction. You should spell all the characters in `key` `one by one by` rotating `ring` clockwise or anticlockwise to make each character of the string key aligned at the `"12:00"` direction and then by pressing the center button.

At the stage of rotating the ring to spell the key character `key[i]`:

1. You can rotate the ring clockwise or anticlockwise by one place, which counts as **one step**. The final purpose of the rotation is to align one of `ring`'s characters at the `"12:00"` direction, where this character must equal `key[i]`. 
2. If the character `key[i]` has been aligned at the `"12:00"` direction, press the center button to spell, which also counts as **one step**. After the pressing, you could begin to spell the next character in the key (next stage). Otherwise, you have finished all the spelling.


**Example 1:**

![](https://assets.leetcode.com/uploads/2018/10/22/ring.jpg)

- **Input:** ring = "godding", key = "gd"
- **Output:** 4
- **Explanation:** 
```
For the first key character 'g', since it is already in place, we just need 1 step to spell this character.
For the second key character 'd', we need to rotate the ring "godding" anticlockwise by two steps to make it become "ddinggo".
Also, we need 1 more step for spelling.
So the final output is 4.
```
**Example 2:**

- **Input:** ring = "godding", key = "godding"
- **Output:** 13


**Constraints:**

- `1 <= ring.length, key.length <= 100`.
- `ring` and `key` consist of only lower case English letters.
- It is guaranteed that `key` could always be spelled by rotating `ring`.



**Solution:**

Here's a breakdown of how we approach it:

### Problem Understanding
We are given two strings:
- `ring`: the circular ring of characters.
- `key`: the word we need to spell by rotating the ring.

For each character in `key`, we rotate the `ring` to align the character at the top (index `0`), and this rotation can happen either clockwise or anticlockwise. The goal is to find the minimum number of rotations (steps) required to spell all the characters of `key`.

### Steps for the Solution

1. **Character Positions**:
    - First, we precompute the positions of each character in `ring`. This allows us to efficiently look up all positions where a given character appears.

2. **Dynamic Programming Table**:
    - Let `dp[i][j]` represent the minimum number of steps required to spell the first `i` characters of `key`, ending with `key[i-1]` aligned at position `j` in `ring`.

3. **Base Case**:
    - For the first character of `key`, we initialize the DP table by calculating the steps needed to rotate `ring` to align `key[0]` with index `0`.

4. **State Transition**:
    - For each character in `key`, we iterate through all positions in `ring` where this character occurs. For each such position, we compute the minimum steps to move from every possible position of the previous character in `key`. The rotation can happen clockwise or anticlockwise, and we take the minimum steps needed for this transition.

5. **Final Answer**:
    - After processing all characters in `key`, the answer will be the minimum number of steps to spell the last character of `key` from any possible position in `ring`.

Let's implement this solution in PHP: **[514. Freedom Trail](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000514-freedom-trail/solution.php)**

```php
<?php
class Solution {

    /**
     * @param String $ring
     * @param String $key
     * @return Integer
     */
    function findRotateSteps($ring, $key) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
    }
}

// Test cases
$solution = new Solution();
echo $solution->findRotateSteps("godding", "gd") . "\n"; // Output: 4
echo $solution->findRotateSteps("godding", "godding") . "\n"; // Output: 13
?>
```

### Explanation:

1. **Preprocessing**:
    - We create an array `$char_positions` where the key is a character, and the value is an array of all indices in `ring` where this character occurs. This helps in efficiently finding positions of each character when needed.

2. **Dynamic Programming Table Initialization**:
    - For the first character of `key`, we initialize the DP table by calculating how many steps are required to move the first character of `key` to the top position (`0` index of `ring`).

3. **DP Table Filling**:
    - For each character in `key`, we compute the minimum number of steps required to move from the previous character's positions to the current character's positions, updating the DP table with the minimum steps.

4. **Result Extraction**:
    - After processing all characters in `key`, the result is the minimum number of steps found in the last row of the DP table.

### Time Complexity
- Precomputing the character positions takes O(n), where `n` is the length of `ring`.
- The DP solution iterates through each character in `key` and for each character, it checks all possible positions in `ring`, resulting in O(k * m^2) complexity, where `k` is the length of `key` and `m` is the number of positions of each character in `ring`.

Thus, the solution efficiently handles the problem's constraints and gives the correct minimum steps to spell the `key`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
