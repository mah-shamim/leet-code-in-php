2206\. Divide Array Into Equal Pairs

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Bit Manipulation`, `Counting`

You are given an integer array `nums` consisting of `2 * n` integers.

You need to divide `nums` into `n` pairs such that:

- Each element belongs to **exactly one** pair.
- The elements present in a pair are **equal**.

Return _`true` if nums can be divided into `n` pairs, otherwise return `false`_.

**Example 1:**

- **Input:** nums = [3,2,3,2,2,2]
- **Output:** true
- **Explanation:**
  There are 6 elements in nums, so they should be divided into 6 / 2 = 3 pairs.
  If nums is divided into the pairs (2, 2), (3, 3), and (2, 2), it will satisfy all the conditions.

**Example 2:**

- **Input:** nums = [1,2,3,4]
- **Output:** false
- **Explanation:**
  There is no way to divide nums into 4 / 2 = 2 pairs such that the pairs satisfy every condition.



**Constraints:**

- `nums.length == 2 * n`
- `1 <= n <= 500`
- `1 <= nums[i] <= 500`


**Hint:**
1. For any number x in the range [1, 500], count the number of elements in nums whose values are equal to x.
2. The elements with equal value can be divided completely into pairs if and only if their count is even.



**Solution:**

We need to determine if an integer array can be divided into pairs such that each pair consists of equal elements. The array has a length of _**2n**_, meaning we need exactly _**n**_ pairs. Each element must be part of exactly one pair, and all elements must be used.

### Approach
The key insight here is that for each element to be paired successfully, each element must appear an even number of times. This is because each element needs exactly one other element of the same value to form a pair. If any element appears an odd number of times, it is impossible to form the required pairs, and we should return false. Conversely, if every element's count is even, we can form all the required pairs and return true.

The steps to solve this problem are:
1. Count the frequency of each element in the array.
2. Check if all frequencies are even numbers.
3. Return true if all frequencies are even, otherwise return false.

Let's implement this solution in PHP: **[2206. Divide Array Into Equal Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002206-divide-array-into-equal-pairs/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Boolean
 */
function divideArray($nums) {
    $counts = array_count_values($nums);
    foreach ($counts as $cnt) {
        if ($cnt % 2 != 0) {
            return false;
        }
    }
    return true;
}

// Test cases
$nums1 = [3,2,3,2,2,2];
$nums2 = [1,2,3,4];

// Output results
var_dump(divideArray($nums1)); // true
var_dump(divideArray($nums2)); // false
?>
```

### Explanation:

1. **Counting Frequencies**: We use `array_count_values` to create an associative array where keys are the elements of the input array and values are their respective counts.
2. **Checking Even Counts**: We iterate over each count value. If any count is odd, we immediately return false as it's impossible to form pairs with an odd count of elements.
3. **Return Result**: If all counts are even, we return true, indicating that the array can be divided into the required pairs.

This approach efficiently checks the necessary condition using a frequency count, ensuring that the solution is both optimal and straightforward. The time complexity is _**O(n)**_, where _**n**_ is the number of elements in the input array, as we iterate through the array once to count frequencies and then through the unique elements to check their counts. The space complexity is also _**O(n)**_ in the worst case where all elements are unique.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**