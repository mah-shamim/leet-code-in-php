3005\. Count Elements With Maximum Frequency

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Counting`, `Weekly Contest 380`

You are given an array `nums` consisting of **positive** integers.

Return _the **total frequencies** of elements in `nums` such that those elements all have the **maximum** frequency_.

The **frequency** of an element is the number of occurrences of that element in the array.

**Example 1:**

- **Input:** nums = [1,2,2,3,1,4]
- **Output:** 4
- **Explanation:** The elements 1 and 2 have a frequency of 2 which is the maximum frequency in the array.
  So the number of elements in the array with maximum frequency is 4.

**Example 2:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 5
- **Explanation:** All elements of the array have a frequency of 1 which is the maximum.
  So the number of elements in the array with maximum frequency is 5.

**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`



**Hint:**
1. Find frequencies of all elements of the array.
2. Find the elements that have the maximum frequencies and count their total occurrences.


**Similar Questions:**
1. [3346. Maximum Frequency of an Element After Performing Operations I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003346-maximum-frequency-of-an-element-after-performing-operations-i)
2. [3347. Maximum Frequency of an Element After Performing Operations II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003347-maximum-frequency-of-an-element-after-performing-operations-ii)
3. [3445. Maximum Difference Between Even and Odd Frequency II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003445-maximum-difference-between-even-and-odd-frequency-ii)






**Solution:**

We need to determine the total frequencies of elements in an array that have the maximum frequency. The frequency of an element is the number of times it appears in the array. The solution involves counting the occurrences of each element, identifying the maximum frequency, and then calculating the sum of the frequencies of all elements that have this maximum frequency.

### Approach
1. **Count Frequencies**: Use a hash map (or an array) to count how many times each element appears in the input array.
2. **Find Maximum Frequency**: Determine the highest frequency value from the frequency counts.
3. **Sum Frequencies of Maximum Elements**: For each element that has a frequency equal to the maximum frequency, add its frequency to the result. Alternatively, multiply the maximum frequency by the number of elements that have this maximum frequency.

Let's implement this solution in PHP: **[3005. Count Elements With Maximum Frequency](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003005-count-elements-with-maximum-frequency/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxFrequencyElements($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums1 = array(1, 2, 2, 3, 1, 4);
echo maxFrequencyElements($nums1) . "\n"; // Output: 4

// Example 2
$nums2 = array(1, 2, 3, 4, 5);
echo maxFrequencyElements($nums2) . "\n"; // Output: 5
?>
```

### Explanation:

1. **Counting Frequencies**: The function `array_count_values` is used to create an associative array where keys are the elements from `$nums` and values are their respective frequencies.
2. **Finding Maximum Frequency**: The `max` function is applied to the values of the frequency array to find the highest frequency.
3. **Counting Elements with Maximum Frequency**: We iterate through the frequency array and count how many elements have a frequency equal to the maximum frequency.
4. **Result Calculation**: The result is obtained by multiplying the maximum frequency by the count of elements that have this maximum frequency. This gives the total number of occurrences of all elements with the maximum frequency.

This approach efficiently computes the desired result by leveraging basic array operations and a single pass through the frequency counts, ensuring optimal performance even for the upper constraint limits. The solution is straightforward and easy to understand, making it suitable for the problem's easy difficulty level.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**