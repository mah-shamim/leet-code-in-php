2601\. Prime Subtraction Operation

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Binary Search`, `Greedy`, `Number Theory`

You are given a **0-indexed** integer array `nums` of length `n`.

You can perform the following operation as many times as you want:

- Pick an index `i` that you haven’t picked before, and pick a prime `p` **strictly less than** `nums[i]`, then subtract `p` from `nums[i]`.

Return _true if you can make `nums` a strictly increasing array using the above operation and false otherwise_.

A **strictly increasing array** is an array whose each element is strictly greater than its preceding element.

**Example 1:**

- **Input:** nums = [4,9,6,10]
- **Output:** true
- **Explanation:** In the first operation: Pick i = 0 and p = 3, and then subtract 3 from nums[0], so that nums becomes [1,9,6,10].
  - In the second operation: i = 1, p = 7, subtract 7 from nums[1], so nums becomes equal to [1,2,6,10].
  - After the second operation, nums is sorted in strictly increasing order, so the answer is true.

**Example 2:**

- **Input:** nums = [6,8,11,12]
- **Output:** true
- **Explanation:** Initially nums is sorted in strictly increasing order, so we don't need to make any operations.


**Example 3:**

- **Input:** nums = [5,8,3]
- **Output:** false
- **Explanation:** It can be proven that there is no way to perform operations to make nums sorted in strictly increasing order, so the answer is false.


**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 1000`
- `nums.length == n`


**Hint:**
1. Think about if we have many primes to subtract from `nums[i]`. Which prime is more optimal?
2. The most optimal prime to subtract from `nums[i]` is the one that makes `nums[i]` the smallest as possible and greater than `nums[i-1]`.



**Solution:**

We need to break down the algorithm and adapt it to PHP syntax and functionality. The solution primarily involves the following steps:

1. **Generating Primes (Sieve of Eratosthenes):** Generate a list of all primes up to the maximum possible value in `nums` (1000).
2. **Prime Subtraction Operation:** For each number in `nums`, check if we can subtract a prime to make the array strictly increasing.
3. **Binary Search for Prime:** Use a binary search to find the largest prime less than the current number that would still keep the sequence strictly increasing.

Let's implement this solution in PHP: **[2601. Prime Subtraction Operation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002601-prime-subtraction-operation/solution.php)**

```php
<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function primeSubOperation($nums) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Helper function to generate all primes up to n using Sieve of Eratosthenes
     *
     * @param $n
     * @return array
     */
    private function sieveEratosthenes($n) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Helper function to find the largest prime less than a given limit using binary search
     *
     * @param $primes
     * @param $limit
     * @return mixed|null
     */
    private function findLargestPrimeLessThan($primes, $limit) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage:
$solution = new Solution();
echo $solution->primeSubOperation([4, 9, 6, 10]) ? 'true' : 'false';  // Output: true
echo $solution->primeSubOperation([6, 8, 11, 12]) ? 'true' : 'false'; // Output: true
echo $solution->primeSubOperation([5, 8, 3]) ? 'true' : 'false';      // Output: false
?>
```

### Explanation:

1. **primeSubOperation**: Loops through each element in `nums` and checks if we can make each element greater than the previous one by subtracting an appropriate prime.
   - We use `$this->findLargestPrimeLessThan` to find the largest prime less than `num - prevNum`.
   - If such a prime exists, we subtract it from the current `num`.
   - If after subtracting the prime, the current `num` is not greater than `prevNum`, we return `false`.
   - Otherwise, we update `prevNum` to the current `num`.

2. **sieveEratosthenes**: Generates all primes up to 1000 using the Sieve of Eratosthenes and returns them as an array.

3. **findLargestPrimeLessThan**: Uses binary search to find the largest prime less than a given limit, ensuring we find the optimal prime for subtraction.

### Complexity Analysis

- **Time Complexity**: _**O(n . &#x221A;m)**_, where _**n**_ is the length of `nums` and m is the maximum value of an element in `nums` (here _**m = 1000**_).
- **Space Complexity**: _**O(m)**_, used to store the list of primes up to `1000`.

This solution will return `true` or `false` based on whether it is possible to make `nums` strictly increasing by performing the described prime subtraction operations.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
