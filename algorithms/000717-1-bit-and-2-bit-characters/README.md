717\. 1-bit and 2-bit Characters

**Difficulty:** Easy

**Topics:** `Array`

We have two special characters:

- The first character can be represented by one bit `0`.
- The second character can be represented by two bits (`10` or `11`).

Given a binary array `bits` that ends with `0`, return `true` if the last character must be a one-bit character.

**Example 1:**

- **Input:** bits = [1,0,0]
- **Output:** true
- **Explanation:** The only way to decode it is two-bit character and one-bit character.
  So the last character is one-bit character.

**Example 2:**

- **Input:** bits = [1,1,1,0]
- **Output:** false
- **Explanation:** The only way to decode it is two-bit character and two-bit character.
  So the last character is not one-bit character.

**Constraints:**

- `1 <= bits.length <= 1000`
- `bits[i]` is either `0` or `1`.



**Hint:**
1. Keep track of where the next character starts. At the end, you want to know if you started on the last bit.



**Similar Questions:**
1. [717. Gray Code](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000717-gray-code)






**Solution:**

We need to determine if the last character in a binary array (ending with 0) must be a one-bit character. The two valid characters are:
- One-bit: `0`
- Two-bit: `10` or `11`

The key is to traverse the array and decode the characters. If we end exactly at the last bit, it must be a one-bit character. Otherwise, if we skip over the last bit (meaning it was part of a two-bit character), it's not a one-bit character.

**Approach:**

We'll traverse the array from left to right. When we encounter a `1`, it must be the start of a two-bit character, so we skip the next bit. When we encounter a `0`, it's a one-bit character, so we move to the next bit. We continue until we reach or pass the last bit. If we land exactly on the last bit, it must be a one-bit character.

Let's implement this solution in PHP: **[717. 1-bit and 2-bit Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000717-1-bit-and-2-bit-characters/solution.php)**

```php
<?php
/**
 * @param Integer[] $bits
 * @return Boolean
 */
function isOneBitCharacter($bits) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo isOneBitCharacter([1,0,0]) . "\n";     // Output: true
echo isOneBitCharacter([1,1,1,0]) . "\n";   // Output: false
?>
```

### Explanation:

1. **Initialization:** Start at the first bit (`$i = 0`).
2. **Traversal:** Loop until we reach the second last bit (`$i < $n - 1`).
   - If the current bit is `1`, it's a two-bit character, so skip the next bit (`$i += 2`).
   - If the current bit is `0`, it's a one-bit character, so move to the next bit (`$i += 1`).
3. **Check Position:** After the loop, if `$i` is exactly at the last bit (`$n - 1`), the last character is a one-bit character. Otherwise, it was part of a two-bit character.

This approach efficiently decodes the array in a single pass, ensuring optimal performance with O(n) time complexity and O(1) space complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**