3606\. Coupon Code Validator

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `String`, `Sorting`, `Weekly Contest 457`

You are given three arrays of length `n` that describe the properties of `n` coupons: `code`, `businessLine`, and `isActive`. The `iᵗʰ` coupon has:
- `code[i]`: a **string** representing the coupon identifier.
- `businessLine[i]`: a **string** denoting the business category of the coupon.
- `isActive[i]`: a **boolean** indicating whether the coupon is currently active.

A coupon is considered **valid** if all of the following conditions hold:
1. `code[i]` is non-empty and consists only of alphanumeric characters (a-z, A-Z, 0-9) and underscores (`_`).
2. `businessLine[i]` is one of the following four categories: `"electronics"`, `"grocery"`, `"pharmacy"`, `"restaurant"`.
3. `isActive[i]` is **true**.

Return an array of the **codes** of all valid coupons, **sorted** first by their **businessLine** in the order: `"electronics"`, `"grocery"`, `"pharmacy"`, `"restaurant"`, and then by **code** in lexicographical (ascending) order within each category.

**Example 1:**

- **Input:** code = ["SAVE20","","PHARMA5","SAVE@20"], businessLine = ["restaurant","grocery","pharmacy","restaurant"], isActive = [true,true,true,true]
- **Output:** ["PHARMA5","SAVE20"]
- **Explanation:**
  - First coupon is valid.
  - Second coupon has empty code (invalid).
  - Third coupon is valid.
  - Fourth coupon has special character `@` (invalid).


**Example 2:**

- **Input:** Input: code = ["GROCERY15","ELECTRONICS_50","DISCOUNT10"], businessLine = ["grocery","electronics","invalid"], isActive = [false,true,true]
- **Output:** ["ELECTRONICS_50"]
- **Explanation:**
  - First coupon is inactive (invalid).
  - Second coupon is valid.
  - Third coupon has invalid business line (invalid).

**Constraints:**

- `n == code.length == businessLine.length == isActive.length`
- `1 <= n <= 100`
- `0 <= code[i].length, businessLine[i].length <= 100`
- `code[i]` and `businessLine[i]` consist of printable ASCII characters.
- `isActive[i]` is either `true` or `false`.



**Hint:**
1. Filter out any coupon where `isActive[i]` is false, `code[i]` is empty or contains non‑alphanumeric/underscore chars, or `businessLine[i]` is not in the allowed set
2. Store each remaining coupon as a pair `(businessLine[i], code[i])`
3. Define a priority map, e.g. `{"electronics":0, "grocery":1, "pharmacy":2, "restaurant":3}`
4. Sort the list of pairs by `(priority[businessLine], code)` and return the `code` values in order






**Solution:**

We need to filter and sort coupon data based on specific validation rules. Let me break down the requirements and implement a solution.

### Approach:

I'll follow these steps:
1. Filter out invalid coupons using the three conditions
2. Map business lines to a priority order for sorting
3. Sort valid coupons first by business line priority, then by code
4. Return just the codes in the correct order

Let's implement this solution in PHP: **[3606. Coupon Code Validator](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003606-coupon-code-validator/solution.php)**

```php
<?php
/**
 * @param String[] $code
 * @param String[] $businessLine
 * @param Boolean[] $isActive
 * @return String[]
 */
function validateCoupons($code, $businessLine, $isActive) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo validateCoupons(["SAVE20","","PHARMA5","SAVE@20"], ["restaurant","grocery","pharmacy","restaurant"], [true,true,true,true]) . "\n";    // Output: ["PHARMA5","SAVE20"]
echo validateCoupons(["GROCERY15","ELECTRONICS_50","DISCOUNT10"], ["grocery","electronics","invalid"], [false,true,true]) . "\n";           // Output: ["ELECTRONICS_50"]
?>
```

### Explanation:

1. **Validation**:
   - Check `isActive[i]` is `true`
   - Check `businessLine[i]` exists in our priority map
   - Check `code[i]` is non-empty and matches regex `/^[a-zA-Z0-9_]+$/`

2. **Sorting**:
   - Use `usort()` with a custom comparator
   - First compare by business line priority (electronics=0, grocery=1, etc.)
   - If priorities are equal, compare by code lexicographically using `strcmp()`

3. **Return**:
   - Extract only the code strings from the sorted array
   - Return as a simple array of strings

## Complexity Analysis
- **Time Complexity**: O(n log n) due to sorting, where n is the number of valid coupons
- **Space Complexity**: O(n) for storing valid coupons

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**