2683\. Neighboring Bitwise XOR

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`

A **0-indexed** array `derived` with length `n` is derived by computing the **bitwise XOR** (⊕) of adjacent values in a **binary array** `original` of length `n`.

Specifically, for each index `i` in the range `[0, n - 1]`:

- If `i = n - 1`, then `derived[i] = original[i] ⊕ original[0]`.
- Otherwise, `derived[i] = original[i] ⊕ original[i + 1]`.

Given an array `derived`, your task is to determine whether there exists a **valid binary array** `original` that could have formed `derived`.

Return _**true** if such an array exists or **false** otherwise_.

- A binary array is an array containing only **0's** and **1's**


**Example 1:**

- **Input:** derived = [1,1,0]
- **Output:** true
- **Explanation:** A valid original array that gives derived is [0,1,0].
  derived[0] = original[0] ⊕ original[1] = 0 ⊕ 1 = 1
  derived[1] = original[1] ⊕ original[2] = 1 ⊕ 0 = 1
  derived[2] = original[2] ⊕ original[0] = 0 ⊕ 0 = 0

**Example 2:**

- **Input:** derived = [1,1]
- **Output:** true
- **Explanation:** A valid original array that gives derived is [0,1].
  derived[0] = original[0] ⊕ original[1] = 1
  derived[1] = original[1] ⊕ original[0] = 1


**Example 3:**

- **Input:** derived = [1,0]
- **Output:** false
- **Explanation:** There is no valid original array that gives derived.



**Constraints:**

- `n == derived.length`
- <code>1 <= n <= 10<sup>5</sup></code>
- The values in `derived` are either **0's** or **1's**


**Hint:**
1. Understand that from the original element, we are using each element twice to construct the derived array
2. The xor-sum of the derived array should be 0 since there is always a duplicate occurrence of each element.



**Solution:**

To determine whether a valid binary array `original` exists that could form the given `derived` array, we can use the properties of XOR:

### Key Observations:
1. Each `derived[i]` is the XOR of two adjacent elements in `original`:
   - For `i = n - 1`, `derived[i] = original[n-1] ⊕ original[0]`.
   - Otherwise, `derived[i] = original[i] ⊕ original[i+1]`.

2. XOR properties:
   - `a ⊕ a = 0` (XOR of a number with itself is 0).
   - `a ⊕ 0 = a` (XOR of a number with 0 is the number itself).
   - XOR is commutative and associative.

3. To construct a valid `original`, the XOR of all elements in `derived` must equal 0. Why? Because for a circular XOR relationship to work (start and end wrap back to the beginning), the cumulative XOR of `derived` should cancel out.

### Steps:
1. Compute the XOR of all elements in `derived`.
2. If the result is 0, a valid `original` exists; otherwise, it does not.

### Algorithm:
- Compute the XOR of all elements in `derived`.
- If the XOR is 0, return `true`.
- Otherwise, return `false`.

Let's implement this solution in PHP: **[2683. Neighboring Bitwise XOR](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002683-neighboring-bitwise-xor/solution.php)**

```php
<?php
/**
 * @param Integer[] $derived
 * @return Boolean
 */
function doesValidArrayExist($derived) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$derived1 = [1, 1, 0];
echo doesValidArrayExist($derived1) ? 'true' : 'false'; // Output: true

// Example 2
$derived2 = [1, 1];
echo doesValidArrayExist($derived2) ? 'true' : 'false'; // Output: true

// Example 3
$derived3 = [1, 0];
echo doesValidArrayExist($derived3) ? 'true' : 'false'; // Output: false
?>
```

### Explanation:

1. We initialize `$xorSum` to 0.
2. For each element in `derived`, we XOR it with `$xorSum`.
3. At the end of the loop, `$xorSum` will contain the XOR of all elements in `derived`.
4. If `$xorSum` is 0, return `true`; otherwise, return `false`.

### Complexity:
- **Time Complexity:** _**O(n)**_, where _**n**_ is the length of `derived`. We only iterate through the array once.
- **Space Complexity:** _**O(1)**_, as we only use a single variable to compute the XOR.

This approach efficiently checks for the existence of a valid `original` array within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
