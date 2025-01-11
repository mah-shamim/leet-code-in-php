1137\. N-th Tribonacci Number

**Difficulty:** Easy

**Topics:** `Math`, `Dynamic Programming`, `Memoization`

The **Tribonacci** sequence T<sub>n</sub> is defined as follows:

T<sub>0</sub> = 0, T<sub>1</sub> = 1, T<sub>2</sub> = 1, and T<sub>n+3</sub> = T<sub>n</sub> + Tn+1 + T<sub>n+2</sub> for n >= 0.

Given `n`, return the value of T<sub>n</sub>.

**Example 1:**

- **Input:** n = 4
- **Output:** 4
- **Explanation:** 


    T_3 = 0 + 1 + 1 = 2
    T_4 = 1 + 1 + 2 = 4

**Example 2:**

- **Input:** n = 25
- **Output:** 1389537 


**Constraints:**

- <code>0 <= n <= 37</code>
- The answer is guaranteed to fit within a 32-bit integer, i.e. <code>answer <= 2<sup>31</sup> - 1</code>.


**Hint:**
1. Make an array F of length 38, and set F[0] = 0, F[1] = F[2] = 1.
2. Now write a loop where you set F[n+3] = F[n] + F[n+1] + F[n+2], and return F[n].



**Solution:**

The Tribonacci sequence is a variation of the Fibonacci sequence, where each number is the sum of the previous three numbers. In this problem, you're tasked with calculating the N-th Tribonacci number using the given recurrence relation:
- _**T<sub>0</sub> = 0, T<sub>1</sub> = 1, T<sub>2</sub> = 1**_
- _**T<sub>n+3</sub> = T<sub>n</sub> + T<sub>n+1</sub> + T<sub>n+2</sub> for n ≥ 0**_

The goal is to compute _**T<sub>n</sub>**_ efficiently, considering the constraints _**0 ≤ n ≤ 37**_.


### **Key Points**
1. **Dynamic Programming Approach**: Since each Tribonacci number depends on the previous three, this is an excellent candidate for dynamic programming.
2. **Space Optimization**: Instead of maintaining a full array for all intermediate values, we only need to track the last three numbers.
3. **Constraints**: The value of _**n**_ is relatively small, so both time and space requirements are manageable.


### **Approach**
1. Use a dynamic programming technique to iteratively calculate T<sub>n</sub>.
2. Maintain a rolling window of size 3 (space optimization) to track the last three values.
3. Initialize the base cases _**T<sub>0</sub>, T<sub>1</sub>, T<sub>2</sub>**_ as _**0**_, _**1**_, and _**1**_, respectively.
4. Use a loop to calculate _**T<sub>n</sub>**_ for _**n ≥ 3**_.


### **Plan**
1. Initialize an array `dp` of size 3 to store the values of _**T<sub>0</sub>, T<sub>1</sub>, T<sub>2</sub>**_.
2. Iterate from _**3**_ to _**n**_, updating `dp` using the recurrence relation: _**dp[i % 3] = dp[0] + dp[1] + dp[2]**_
3. Return the value of `dp[n % 3]` as the result.

Let's implement this solution in PHP: **[1137. N-th Tribonacci Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001137-n-th-tribonacci-number/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function tribonacci(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$n1 = 4;
$n2 = 25;

echo tribonacci($n1) . "\n"; // Output: 4
echo tribonacci($n2) . "\n"; // Output: 1389537
?>
```

### Explanation:

- **Initialization**: Start with the first three Tribonacci numbers, _**T<sub>0</sub> = 0, T<sub>1</sub> = 1, T<sub>2</sub> = 1**_.
- **Loop Logic**: For _**n ≥ 3**_, calculate the next number as the sum of the previous three. Use modulo operations to store the values cyclically in the array.
- **Return Result**: Use _**dp[n % 3]**_ to get the desired Tribonacci number after the loop.


### **Example Walkthrough**
#### Input: _**n = 4**_
1. **Initialization**: _**dp = [0, 1, 1]**_ (represents _**T<sub>0</sub>, T<sub>1</sub>, T<sub>2</sub>**_).
2. **Iteration**:
    - _**i = 3**_: _**dp[0] = dp[0] + dp[1] + dp[2] = 0 + 1 + 1 = 2**_, _**dp = [2, 1, 1]**_
    - _**i = 4**_: _**dp[1] = dp[0] + dp[1] + dp[2] = 2 + 1 + 1 = 4**_, _**dp = [2, 4, 1]**_
3. **Return Result**: _**dp[4 % 3] = dp[1] = 4**_

#### Output: _**4**_

### **Time Complexity**
- **Computation**: _**O(n)**_ since we iterate from _**3**_ to _**n**_.
- **Space**: _**O(1)**_ as we only use a fixed-size array of length _**3**_.

### **Output for Example**
- _**n = 4**_: _**T<sub>4</sub> = 4**_
- _**n = 25**_: _**T<sub>25</sub> = 1389537**_


The optimized solution efficiently calculates the N-th Tribonacci number using a space-optimized dynamic programming approach. It ensures both correctness and performance, adhering to the constraints provided in the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**