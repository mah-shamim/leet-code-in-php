1550\. Three Consecutive Odds

**Difficulty:** Easy

**Topics:** `Array`

Given an integer array `arr`, return `true` if there are three consecutive odd numbers in the array. Otherwise, return `false`.

**Example 1:**

- **Input:** arr = [2,6,4,1]
- **Output:** false
- **Explanation:** There are no three consecutive odds.

**Example 2:**

- **Input:** arr = [1,2,34,3,4,5,7,23,12]
- **Output:** true
- **Explanation:** [5,7,23] are three consecutive odds.

**Constraints:**

- <code>1 <= arr.length <= 1000</code>
- <code>1 <= arr[i] <= 1000</code>
- `0 <= cost[i][j] <= 100`


**Hint:**
1. Check every three consecutive numbers in the array for parity.



**Solution:**

The problem asks us to determine if an array contains three consecutive odd numbers. If such a triplet exists, return `true`; otherwise, return `false`.


### **Key Points**

1. **Input:** An array of integers (`arr`) where each element satisfies _**1 \leq arr[i] \leq 1000**_.
2. **Output:** A boolean indicating the presence of three consecutive odd numbers.
3. **Core Operation:** Checking for odd numbers and consecutive patterns.
4. **Constraints:**
    - Array length is at least 1 and at most 1000.


### **Approach**

We need to iterate through the array and check every triplet of consecutive numbers to see if they are all odd. If we find such a triplet, we can immediately return `true`. If we traverse the entire array without finding one, return `false`.


### **Plan**

1. Traverse the array from the first to the third last element, as each triplet involves three elements.
2. For every element at index `i`, check if:
    - _**arr[i] % 2 ≠ 0**_ (odd)
    - _**arr[i+1] % 2 ≠ 0**_ (odd)
    - _**arr[i+2] % 2 ≠ 0**_ (odd)
3. If the condition holds true, return `true`.
4. If the loop completes without finding any such triplet, return `false`.

Let's implement this solution in PHP: **[1550. Three Consecutive Odds](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001550-three-consecutive-odds/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Boolean
 */
function threeConsecutiveOdds($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$arr1 = [[15, 96], [36, 2]];
$arr2 = [[1, 3, 5], [4, 1, 1], [1, 5, 3]];
$arr3 = [[2, 5, 1], [3, 4, 7], [8, 1, 2], [6, 2, 4], [3, 8, 8]];

echo threeConsecutiveOdds($arr1) . "\n"; // Output: 17
echo threeConsecutiveOdds($arr2) . "\n"; // Output: 4
echo threeConsecutiveOdds($arr3) . "\n"; // Output: 10
?>
```

### Explanation:

- **Step 1:** Start iterating through the array up to index _**n-3**_, where _**n**_ is the array length.
- **Step 2:** For each index `i`, check if the element at `i`, `i+1`, and `i+2` are odd numbers.
- **Step 3:** If found, return `true` immediately.
- **Step 4:** If the loop finishes without finding a triplet, return `false`.


### **Example Walkthrough**

#### Example 1:
**Input:** `arr = [2, 6, 4, 1]`
- _**i = 0**_: Triplet is `[2, 6, 4]`, none are odd.
- _**i = 1**_: Triplet is `[6, 4, 1]`, none are odd.

**Output:** `false`  
**Explanation:** There are no three consecutive odd numbers.


#### Example 2:
**Input:** `arr = [1, 2, 34, 3, 4, 5, 7, 23, 12]`
- _**i = 0**_: Triplet is `[1, 2, 34]`, not all are odd.
- _**i = 4**_: Triplet is `[4, 5, 7]`, not all are odd.
- _**i = 5**_: Triplet is `[5, 7, 23]`, all are odd.

**Output:** `true`  
**Explanation:** The triplet `[5, 7, 23]` satisfies the condition.


### **Time Complexity**

- **Loop:** _**O(n)**_, where _**n**_ is the size of the array, as we iterate through the array once.
- **Check for Odd:** _**O(1)**_ per triplet.

**Overall Time Complexity:** _**O(n)**_  
**Space Complexity:** _**O(1)**_ (No additional space used).


### **Output for Example**

1. **Example 1 Input:** `arr = [2, 6, 4, 1]`  
   **Output:** `false`

2. **Example 2 Input:** `arr = [1, 2, 34, 3, 4, 5, 7, 23, 12]`  
   **Output:** `true`


The solution efficiently identifies three consecutive odd numbers by iterating through the array once. It utilizes a straightforward condition to determine odd parity and exits early when a valid triplet is found, minimizing unnecessary checks. The approach is optimal for the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#285, #286 leetcode problems 001550-three-consecutive-odds submissions 1306052925



