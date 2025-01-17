1545\. Find Kth Bit in Nth Binary String

**Difficulty:** Medium

**Topics:** `String`, `Recursion`, `Simulation`

Given two positive integers `n` and `k`, the binary string <code>S<sub>n</sub></code> is formed as follows:

- <code>S<sub>1</sub> = "0"</code>
- <code>S<sub>i</sub> = S<sub>i - 1</sub> + "1" + reverse(invert(S<sub>i - 1</sub>))</code> for `i > 1`

Where `+` denotes the concatenation operation, `reverse(x)` returns the reversed string `x`, and `invert(x)` inverts all the bits in `x` (`0` changes to `1` and `1` changes to `0`).

For example, the first four strings in the above sequence are:

- <code>S<sub>1</sub> = "0"</code>
- <code>S<sub>2</sub> = "011"</code>
- <code>S<sub>3</sub> = "0111001"</code>
- <code>S<sub>4</sub> = "011100110110001"</code>

Return _the <code>k<sup>th</sup></code> bit in <code>S<sub>n</sub></code>_. It is guaranteed that `k` is valid for the given `n`.

**Example 1:**

- **Input:** n = 3, k = 1
- **Output:** "0"
- **Explanation:** S<sub>3</sub> is "<u>**0**</u>111001".\
  The 1<sup>st</sup> bit is "0".

**Example 2:**

- **Input:** n = 4, k = 11
- **Output:** "1"
- **Explanation:** S<sub>4</sub> is "0111001101<u>**1**</u>0001".
  The 11<sup>th</sup> bit is "1".

**Example 3:**

- **Input:** n = 3, k = 2
- **Output:** "0"



**Constraints:**

- `1 <= n <= 20`
- <code>1 <= k <= 2<sup>n</sup> - 1</code>


**Hint:**
1. Since n is small, we can simply simulate the process of constructing S1 to Sn.



**Solution:**

We need to understand the recursive process used to generate each binary string <code>_S<sub>n</sub>_</code> and use this to determine the _`k`_-th bit without constructing the entire string.

### Approach:

1. **Recursive String Construction**:
   - **S<sub>1</sub> = "0"**.
   - For `i > 1`:
      - <code>**S<sub>i</sub>**</code> is constructed as:
        <code>
        **S<sub>i</sub> = S<sub>i-1</sub> + "1" + reverse(invert(S<sub>i-1</sub>))**
        </code>
   - This means _**S<sub>i</sub>**_ consists of three parts:
      - _**S<sub>i-1</sub>**_ (the original part)
      - "1" (the middle bit)
      - **reverse(invert(_S<sub>i-1</sub>_))** (the transformed part)

2. **Key Observations**:
   - _**S<sub>i</sub>**_ has a length of _**2<sup>i-1</sup>**_.
   - The middle bit (position _**2<sup>i-1</sup>**_ of _**S<sub>i</sub>**_ is always "1".
   - If _**k**_ lies in the first half, it falls within _**S<sub>i-1</sub>**_.
   - If _**k**_ is exactly the middle position, the answer is "1".
   - If _**k**_ is in the second half, it corresponds to the reverse-inverted part.

3. **Inverting and Reversing**:
   - To determine the bit in the second half, map _**k**_ to its corresponding position in the first half using:
     <code>
     _k' = 2<sup>i</sup> - k_
     </code>
   - The bit at this position in the original half is inverted, so we need to flip the result.

4. **Recursive Solution**:
   - Recursively determine the _**k**_-th bit by reducing _**n**_ and mapping _**k**_ until _**n = 1**_.

Let's implement this solution in PHP: **[1545. Find Kth Bit in Nth Binary String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001545-find-kth-bit-in-nth-binary-string/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $k
 * @return String
 */
function findKthBit($n, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}
?>
```

### Explanation:

- **Base Case**: If _**n = 1**_, _**S<sub>i</sub>**_ is "0", so the only possible value for any _**k**_ is "0".
- **Recursive Steps**:
   - Calculate the middle index _**mid**_ which is _**2<sup>n-1</sup>**_.
   - If _**k**_ matches the middle index, return "1".
   - If _**k**_ is less than _**mid**_, the _**k**_-th bit lies in the first half, so we recursively find the _**k**_-th bit in _**S<sub>n-1</sub>**_.
   - If _**k**_ is greater than _**mid**_, we find the corresponding bit in the reverse-inverted second half and flip it.

### Complexity Analysis:

- **Time Complexity**: _**O(n)**_ because each recursive call reduces _**n**_ by 1.
- **Space Complexity**: _**O(n)**_ for the recursive call stack.

### Example Walkthrough:

1. **Input**: _**n = 3**_ , _**k = 1**_ 
   - _**S<sub>3</sub>**_ = **"0111001"** 
   - _**k = 1**_  falls in the first half, so we look for _**k = 1**_  in _**S<sub>2</sub>**_.
   - In _**S<sub>2</sub>**_ = **"011"** , _**k = 1**_  corresponds to "0".

2. **Input**: _**n = 4**_ , _**k = 11**_ 
   - _**S<sub>4</sub>**_ = **"011100110110001"** 
   - The middle index for _**S<sub>4</sub>**_  is **8**.
   - _**k = 11**_ falls in the second half.
   - Map _**k = 11**_ to the corresponding bit in the first half: _**k'**_ **= 2<sup>4<sup> - 11 = 5**.
   - Find _**k = 5**_ in _**S<sub>3</sub>**_ , which is "0", then flip it to "1".

By leveraging recursion and properties of the string construction, this solution avoids generating the entire string, making it efficient even for larger _**n**_.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
