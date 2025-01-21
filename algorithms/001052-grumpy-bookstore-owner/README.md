1052\. Grumpy Bookstore Owner

**Difficulty:** Medium

**Topics:** `Array`, `Sliding Window`

There is a bookstore owner that has a store open for `n` minutes. Every minute, some number of customers enter the store. You are given an integer array `customers` of length n where `customers[i]` is the number of the customer that enters the store at the start of the <code>i<sup>th</sup></code> minute and all those customers leave after the end of that minute.

On some minutes, the bookstore owner is grumpy. You are given a binary array grumpy where `grumpy[i]` is `1` if the bookstore owner is grumpy during the <code>i<sup>th</sup></code> minute, and is `0` otherwise.

When the bookstore owner is grumpy, the customers of that minute are not **satisfied**, otherwise, they are satisfied.

The bookstore owner knows a secret technique to keep themselves **not grumpy** for `minutes` consecutive minutes, but can only use it **once**.

Return _the **maximum** number of customers that can be satisfied throughout the day_.

**Example 1:**

- **Input:** customers = [1,0,1,2,1,1,7,5], grumpy = [0,1,0,1,0,1,0,1], minutes = 3
- **Output:** 16
- **Explanation:** The bookstore owner keeps themselves not grumpy for the last 3 minutes.\
  The maximum number of customers that can be satisfied = 1 + 1 + 1 + 1 + 7 + 5 = 16.

**Example 2:**

- **Input:** customers = [1], grumpy = [0], minutes = 1
- **Output:** 1

**Constraints:**

- <code>n == customers.length == grumpy.length</code>
- <code>1 <= minutes <= n <= 2 * 10<sup>4</sup></code>
- <code>0 <= customers[i] <= 1000</code>
- `grumpy[i]` is either `0` or `1`.


**Hint:**
1. Say the store owner uses their power in minute `1` to `X` and we have some answer `A`. If they instead use their power from minute `2` to `X+1`, we only have to use data from minutes `1`, `2`, `X` and `X+1` to update our answer `A`.


**Solution:**

The problem asks us to calculate the maximum number of customers that can be satisfied at a bookstore, given that the bookstore owner can use a special technique to remain non-grumpy for `minutes` consecutive minutes. The goal is to find the maximum number of customers that can be satisfied during the store's opening hours. The satisfaction of customers depends on whether the bookstore owner is grumpy during each minute. If the owner is grumpy, customers entering that minute are not satisfied, but if they are not grumpy, the customers are satisfied.

### **Key Points**
- The problem involves two arrays: `customers` and `grumpy`.
  - `customers[i]` represents the number of customers entering at minute `i`.
  - `grumpy[i]` indicates whether the owner is grumpy at minute `i` (1 if grumpy, 0 if not).
- The owner has a special technique to remain non-grumpy for a specified number of consecutive minutes, which can be applied only once.
- The task is to maximize the total number of customers that can be satisfied by choosing a window of `minutes` consecutive minutes during which the owner will remain non-grumpy.

### **Approach**
To solve this problem, we can use the sliding window technique:
1. **Initial Satisfaction Calculation**:
  - Start by calculating the total satisfaction (`satisfied`) when the owner is not grumpy (i.e., when `grumpy[i] == 0`). This is done by iterating through the `grumpy` array and summing the number of customers for each minute where the owner is not grumpy.
2. **Sliding Window of Grumpy Minutes**:
  - We want to find the optimal window of `minutes` consecutive minutes where the owner remains non-grumpy to maximize the number of additional satisfied customers.
  - The sliding window will help us compute this efficiently by keeping track of how many unsatisfied customers could be made happy by using the special technique during the window. As we move the window forward, we subtract the number of customers from the minute that is left behind and add the number of customers from the new minute.
3. **Calculate Maximum Satisfaction**:
  - We compute the total satisfied customers as the sum of the initial satisfaction and the best possible satisfaction gained from using the technique.

### **Plan**
1. Initialize a variable `satisfied` to track the initial satisfied customers.
2. Use a sliding window of size `minutes` to find the maximum possible additional customers that can be satisfied.
3. For each minute, if the owner is grumpy, add the number of customers to a temporary variable `windowSatisfied`. This represents the number of customers that can potentially be satisfied if the technique is applied to that window.
4. As we move the window, update the best possible result (`madeSatisfied`).
5. Return the total satisfaction, which is the sum of the initially satisfied customers and the best possible window satisfaction.

Let's implement this solution in PHP: **[1052. Grumpy Bookstore Owner](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001052-grumpy-bookstore-owner/solution.php)**

```php
<?php
/**
 * @param Integer[] $customers
 * @param Integer[] $grumpy
 * @param Integer $minutes
 * @return Integer
 */
function maxSatisfied($customers, $grumpy, $minutes) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$customers = [1,0,1,2,1,1,7,5];
$grumpy = [0,1,0,1,0,1,0,1];
$minutes = 3;
echo maxSatisfied($customers, $grumpy, $minutes);  // Output: 16

// Example 2
$customers = [1];
$grumpy = [0];
$minutes = 1;
echo maxSatisfied($customers, $grumpy, $minutes); // Output: 1
?>
```

### Explanation:

1. **Initial Satisfaction Calculation**:
  - Loop through the `grumpy` array and for each minute where the owner is not grumpy (`grumpy[i] == 0`), add the corresponding number of customers to `satisfied`.
2. **Sliding Window Calculation**:
  - Start by summing up the number of customers for the first `minutes` minutes where the owner is grumpy. This sum is stored in `windowSatisfied`.
  - Slide the window through the array, subtracting the customers from the minute that leaves the window and adding the customers from the minute that enters the window.
  - Track the maximum value of `windowSatisfied` during this sliding process.
3. **Final Calculation**:
  - The total number of satisfied customers is the sum of `satisfied` (the customers who are already satisfied when the owner is not grumpy) and `madeSatisfied` (the maximum number of customers that can be made satisfied using the special technique).

### **Example Walkthrough**

#### Example 1:
- **Input**:
  ```php
  customers = [1, 0, 1, 2, 1, 1, 7, 5]
  grumpy = [0, 1, 0, 1, 0, 1, 0, 1]
  minutes = 3
  ```

- **Initial Satisfaction**:
  - In the minutes where `grumpy[i] == 0`, the customers are satisfied:
    - Minute 0: 1 customer (owner not grumpy)
    - Minute 2: 1 customer (owner not grumpy)
    - Minute 4: 1 customer (owner not grumpy)
    - Minute 6: 7 customers (owner not grumpy)
    - Total satisfied = `1 + 1 + 1 + 7 = 10`

- **Sliding Window Calculation**:
  - For a window of 3 minutes, calculate how many more customers could be satisfied if the owner stays non-grumpy during those minutes:
    - Minute 1, 3, 5 (grumpy): 0 + 2 + 1 = 3 potential customers
    - Minute 2, 4, 6 (grumpy): 1 + 1 + 7 = 9 potential customers
    - Best possible window = 9 customers

- **Total Satisfaction** = `10 (initial) + 6 (maximized satisfaction) = 16`

- **Output**:
  ```php
  16
  ```

#### Example 2:
- **Input**:
  ```php
  customers = [1]
  grumpy = [0]
  minutes = 1
  ```

- **Initial Satisfaction**: 1 customer (owner not grumpy)
- **Sliding Window Calculation**: No grumpy time, so no need for a technique.
- **Output**: `1`

### **Time Complexity**
- **Time Complexity**: O(n), where `n` is the length of the `customers` array. This is because we iterate over the array a few times (for initial satisfaction and the sliding window calculation).
- **Space Complexity**: O(1), since we only use a few variables to track the satisfaction and window.

This problem is efficiently solved using the sliding window technique. By iterating through the array and keeping track of potential satisfied customers, we can optimize the use of the owner's non-grumpy technique. The approach ensures that we calculate the maximum possible satisfaction in linear time, making it feasible even for the upper limits of the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**