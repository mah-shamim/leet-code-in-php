1404\. Number of Steps to Reduce a Number in Binary Representation to One

**Difficulty:** Medium

**Topics:** `String`, `Bit Manipulation`

Given the binary representation of an integer as a string `s`, return _the number of steps to reduce it to `1` under the following rules:_

- If the current number is even, you have to divide it by `2`.
- If the current number is odd, you have to add `1` to it.

It is guaranteed that you can always reach one for all test cases.

**Example 1:**

- **Input:** "1101"
- **Output:** 6
- **Explanation:** "1101" corressponds to number 13 in their decimal representation.
  - Step 1) 13 is odd, add 1 and obtain 14.
  - Step 2) 14 is even, divide by 2 and obtain 7.
  - Step 3) 7 is odd, add 1 and obtain 8.
  - Step 4) 8 is even, divide by 2 and obtain 4.  
  - Step 5) 4 is even, divide by 2 and obtain 2.
  - Step 6) 2 is even, divide by 2 and obtain 1.

**Example 2:**

- **Input:** s = "10"
- **Output:** 1
- **Explanation:** "10" corressponds to number 2 in their decimal representation.
  - Step 1) 2 is even, divide by 2 and obtain 1.

**Example 3:**

- **Input:** s = "1"
- **Output:** 0 

**Constraints:**

- <code>1 <= s.length <= 500</code>
- <code>s</code> consists of characters '0' or '1'
- <code>s[0] == '1'</code>


**Hint:**
1. Read the string from right to left, if the string ends in '0' then the number is even otherwise it is odd.
2. Simulate the steps described in the binary string.



**Solution:**

We are given a binary string `s` that represents a number. The goal is to reduce this number to `1` by performing the following operations:
- If the number is even, divide it by `2`.
- If the number is odd, add `1` to it.

We need to determine how many steps it takes to achieve this.

### Observations
1. A binary number is **even** if its last digit is `0` and **odd** if its last digit is `1`.
2. Dividing a binary number by `2` is equivalent to removing its last digit (`s = substr($s, 0, -1)`).
3. Adding `1` to a binary number can sometimes cause a carry that affects the preceding digits.

### Approach
Simulate the process step by step:
1. Start from the least significant bit (rightmost character of the string).
2. Check if the number is odd or even:
  - If odd: Add `1`. This might propagate a carry, modifying the preceding bits.
  - If even: Divide by `2`, which removes the last digit.
3. Continue the simulation until the number is reduced to `1`.
4. Keep a counter to track the number of steps.

Let's implement this solution in PHP: **[1404. Number of Steps to Reduce a Number in Binary Representation to One](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001404-number-of-steps-to-reduce-a-number-in-binary-representation-to-one/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function numSteps($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s1 = "1101";
$s2 = "10";
$s3 = s = "1";

echo numSteps($s1) . "\n"; // Output: 6
echo numSteps($s2) . "\n"; // Output: 1
echo numSteps($s3) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Variables**:
  - `steps`: Keeps track of the total number of operations performed.
  - `carry`: Tracks if there is a carry after adding `1` to a binary number.

2. **Iteration**:
  - Start from the rightmost bit and process each bit up to the second bit (skip the first bit for now).
  - For each bit:
    - If it’s `1`: Adding `1` makes it `0`, but it propagates a carry to the next bit. This requires two operations (add and divide).
    - If it’s `0`: Division directly removes the bit. However, if there is a carry from the previous bit, the `0` effectively acts as a `1`, requiring extra operations.

3. **Final Step**:
  - After processing all bits except the first, check if there’s a carry for the most significant bit. If so, add one final step.

### Complexity Analysis
1. **Time Complexity**: _**O(n)**_, where _**n**_ is the length of the binary string `s`. This is because we iterate through each bit once.
2. **Space Complexity**: _**O(1)**_, as we use only a few variables and do not allocate additional data structures.

### Example Walkthrough

#### Input: `"1101"` (Binary for 13)
1. Start processing from the rightmost bit:
  - Bit 1: Odd → Add `1` → Becomes `1110`. Steps: `2`.
  - Bit 0: Even → Divide by `2` → Becomes `111`. Steps: `3`.
  - Bit 1: Odd → Add `1` → Becomes `1000`. Steps: `5`.
  - Bit 0: Even → Divide by `2` → Becomes `100`. Steps: `6`.
  - Bit 0: Even → Divide by `2` → Becomes `10`. Steps: `7`.
  - Bit 0: Even → Divide by `2` → Becomes `1`. Steps: `8`.

#### Final Steps: Total = `6`.

### Edge Cases
1. **Input `"1"`**:
  - Already `1`, no steps needed. Output: `0`.

2. **Input `"10"`**:
  - `"10"` → `"1"` in one step. Output: `1`.

3. **Large Binary Strings**:
  - The algorithm handles large inputs efficiently due to its linear time complexity.

This solution is robust, optimized, and adheres to the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#271, #272 leetcode problems 001404-number-of-steps-to-reduce-a-number-in-binary-representation-to-one submissions 1271541018


