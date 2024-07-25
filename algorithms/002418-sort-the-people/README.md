2418\. Sort the People

Easy

You are given an array of strings `names`, and an array `heights` that consists of **distinct** positive integers. Both arrays are of length `n`.

For each index `i`, `names[i]` and `heights[i]` denote the name and height of the <code>i<sup>th</sup></code> person.

Return _`names` sorted in **descending** order by the people's heights_.

**Example 1:**

- **Input:** names = ["Mary","John","Emma"], heights = [180,165,170]
- **Output:** ["Mary","Emma","John"]
- **Explanation:** Mary is the tallest, followed by Emma and John. 

**Example 2:**

- **Input:** names = ["Alice","Bob","Bob"], heights = [155,185,150]
- **Output:** ["Bob","Alice","Bob"]
- **Explanation:** The first Bob is the tallest, followed by Alice and the second Bob. 

**Constraints:**

- <code>n == names.length == heights.length</code>
- <code>1 <= n <= 10<sup>3</sup></code>
- <code>1 <= names[i].length <= 20</code>
- <code>1 <= heights[i] <= 10<sup>5</sup></code>
- `names[i]` consists of lower and upper case English letters.
- All the values of `heights` are distinct.


**Hint:**
1. Find the tallest person and swap with the first person, then find the second tallest person and swap with the second person, etc. Repeat until you fix all n people.


**Solution:**


To solve this problem, we can follow these steps:

Let's implement this solution in PHP: **[1. Two Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000001-two-sum/solution.php)**

```php
<?php
// Test the function with example inputs
print_r(twoSum([2, 7, 11, 15], 9)); // Output: [0, 1]
print_r(twoSum([3, 2, 4], 6)); // Output: [1, 2]
print_r(twoSum([3, 3], 6)); // Output: [0, 1]
?>
```

### Explanation:

1. **Initialization**:
    - Create an empty associative array `$map` to store the numbers and their indices.

2. **Iteration**:
    - Loop through the array using a `foreach` loop.
    - For each number, calculate its complement (`$target - $num`).

3. **Check for Complement**:
    - If the complement exists in the associative array (`isset($map[$complement])`), return the index of the complement and the current index.
    - If not, store the current number and its index in the associative array (`$map[$num] = $index`).

4. **Return**:
    - The function will return an array containing the indices of the two numbers that add up to the target.

This solution has a time complexity of \(O(n)\) and a space complexity of \(O(n)\), making it efficient for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
