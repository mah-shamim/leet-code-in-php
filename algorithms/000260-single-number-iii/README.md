260\. Single Number III

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`

Given an integer array **nums**, in which exactly two elements appear only once and all the other elements appear exactly twice. Find the two elements that appear only once. You can return the answer in **any order**.

You must write an algorithm that runs in linear runtime complexity and uses only constant extra space.

**Example 1:**

- **Input:** nums = [1,2,1,3,2,5]
- **Output:** [3,5]
- **Explanation:** [5, 3] is also a valid answer. 

**Example 2:**

- **Input:** nums = [-1,0]
- **Output:** [-1,0] 

**Example 3:**

- **Input:** nums = [0,1]
- **Output:** [1,0] 

**Constraints:**

- <code>2 <= nums.length <= 3 * 10<sup>4</sup></code>
- <code>-2<sup>31</sup> <= nums[i] <= 2<sup>31</sup> - 1</code>
- Each integer in **nums** will appear twice, only two integers will appear once.


**Solution:**


We can use bit manipulation, specifically the XOR operation. The key idea is that XORing two identical numbers results in 0, and XORing a number with 0 gives the number itself. Using this property, we can find the two unique numbers that appear only once in the array.

### Step-by-Step Solution:

1. **XOR all elements** in the array. The result will be the XOR of the two unique numbers because all other numbers will cancel out (since they appear twice).

2. **Find a set bit** in the XOR result (this bit will be different between the two unique numbers). You can isolate the rightmost set bit using `xor & (-xor)`.

3. **Partition the array** into two groups based on the set bit. XOR all numbers in each group to find the two unique numbers.

Let's implement this solution in PHP: **[260. Single Number III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000260-single-number-iii/solution.php)**

```php
<?php
// Example usage:
$nums1 = [1, 2, 1, 3, 2, 5];
$result1 = singleNumber($nums1);
print_r($result1);

$nums2 = [-1, 0];
$result2 = singleNumber($nums2);
print_r($result2);

$nums3 = [0, 1];
$result3 = singleNumber($nums3);
print_r($result3);
?>
```

### Explanation:

- **Step 1:** The XOR operation eliminates the numbers that appear twice and results in `xor` being the XOR of the two unique numbers.
- **Step 2:** The rightmost set bit is found, which helps in distinguishing the two unique numbers.
- **Step 3:** The array is partitioned into two groups: one with the set bit and one without. XORing the numbers in each group gives the two unique numbers.

This solution runs in O(n) time and uses O(1) extra space, meeting the problem's requirements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
