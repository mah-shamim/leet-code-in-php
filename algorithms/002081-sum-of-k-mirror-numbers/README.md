2081\. Sum of k-Mirror Numbers

**Difficulty:** Hard

**Topics:** `Math`, `Enumeration`

A **k-mirror number** is a **positive** integer **without leading zeros** that reads the same both forward and backward in base-10 **as well as** in base-k.

- For example, `9` is a 2-mirror number. The representation of `9` in base-10 and base-2 are `9` and `1001` respectively, which read the same both forward and backward.
- On the contrary, `4` is not a 2-mirror number. The representation of `4` in base-2 is `100`, which does not read the same both forward and backward.

Given the base `k` and the number `n`, return the **sum** of the `n` **smallest** k-mirror numbers.

**Example 1:**

- **Input:** k = 2, n = 5
- **Output:** 25
- **Explanation:** The 5 smallest 2-mirror numbers and their representations in base-2 are listed as follows:

  | base-10 | base-2 |
  |---------|--------|
  | 1       | 1      |
  | 3       | 11     |
  | 5       | 101    |
  | 7       | 111    |
  | 9       | 1001   |
  - Their sum = 1 + 3 + 5 + 7 + 9 = 25.

**Example 2:**

- **Input:** k = 3, n = 7
- **Output:** 499
- **Explanation:** The 7 smallest 3-mirror numbers are and their representations in base-3 are listed as follows:
  
  | base-10 | base-3 |
  |---------|--------|
  | 1       | 1      |
  | 2       | 2      |
  | 4       | 11     |
  | 8       | 22     |
  | 121     | 11111  |
  | 151     | 12121  |
  | 212     | 21212  |
  - Their sum = 1 + 2 + 4 + 8 + 121 + 151 + 212 = 499.

**Example 3:**

- **Input:** k = 7, n = 17
- **Output:** 20379000
- **Explanation:** The 17 smallest 7-mirror numbers are: 1, 2, 3, 4, 5, 6, 8, 121, 171, 242, 292, 16561, 65656, 2137312, 4602064, 6597956, 6958596

**Constraints:**

- `2 <= k <= 9`
- `1 <= n <= 30`


**Hint:**
1. Since we need to reduce search space, instead of checking if every number is a palindrome in base-10, can we try to "generate" the palindromic numbers?
2. If you are provided with a d digit number, how can you generate a palindrome with 2*d or 2*d - 1 digit?
3. Try brute-forcing and checking if the palindrome you generated is a "k-Mirror" number.


**Similar Questions:**
1. [247. Strobogrammatic Number II](https://leetcode.com/problems/strobogrammatic-number-ii/)
2. [866. Prime Palindrome](https://leetcode.com/problems/prime-palindrome/description/)






**Solution:**

We need to find the sum of the `n` smallest **k-mirror numbers**. A k-mirror number is a positive integer that reads the same both forward and backward in both base-10 and base-k. The solution involves generating palindromic numbers in base-10 and checking if they are also palindromic in base-k.

### Approach
1. **Generate Palindromic Numbers in Base-10**:
   - We generate palindromic numbers in increasing order by their digit lengths. For each digit length `L`:
      - **Even Length (L is even)**: The palindrome is formed by concatenating a number `x` with its reverse. For example, if `x` is 12, the palindrome is 1221.
      - **Odd Length (L is odd)**: The palindrome is formed by concatenating a number `x` with the reverse of `x` without its last digit. For example, if `x` is 12, the palindrome is 121.
   - We start generating palindromes from the smallest possible length (1 digit) and proceed to longer lengths until we collect `n` k-mirror numbers.

2. **Check Palindrome in Base-k**:
   - For each generated base-10 palindrome, convert it to base-k.
   - Check if the base-k representation is a palindrome. This involves:
      - Converting the number to base-k by repeatedly dividing the number by `k` and collecting remainders.
      - Comparing the generated base-k string with its reverse to determine if it reads the same backward as forward.

3. **Sum the Valid Numbers**:
   - Collect the first `n` valid k-mirror numbers and return their sum.

Let's implement this solution in PHP: **[2081. Sum of k-Mirror Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002081-sum-of-k-mirror-numbers/solution.php)**

```php
<?php
/**
 * @param Integer $k
 * @param Integer $n
 * @return Integer
 */
function kMirror($k, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $num
 * @param $k
 * @return bool
 */
function is_basek_palindrome($num, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo kMirror(2, 5) . PHP_EOL;   // 25
echo kMirror(3, 7) . PHP_EOL;   // 499
echo kMirror(7, 17) . PHP_EOL;  // 20379000
?>
```

### Explanation:

1. **Generating Palindromic Numbers**:
   - For each digit length `L`, we generate palindromic numbers:
      - **Even `L`**: The palindrome is created by mirroring the entire string of digits. For example, for `x = 12`, the palindrome is `1221`.
      - **Odd `L`**: The palindrome is created by mirroring the string except the last digit. For example, for `x = 12`, the palindrome is `121`.
   - We start with the smallest digit length (1) and proceed to longer lengths until we have collected `n` k-mirror numbers.

2. **Checking Base-k Palindrome**:
   - For each generated palindrome, we convert it to base-k by repeatedly dividing the number by `k` and collecting remainders. The remainders form the base-k representation in reverse order, which we then reverse to get the correct string.
   - We check if this base-k string is a palindrome by comparing it with its reverse.

3. **Summing Valid Numbers**:
   - We collect the first `n` numbers that are palindromic in both base-10 and base-k. The sum of these numbers is returned as the result.

This approach efficiently generates palindromic numbers in increasing order and checks their validity in base-k, ensuring optimal performance for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**