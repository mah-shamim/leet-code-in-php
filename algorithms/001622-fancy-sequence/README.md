1622\. Fancy Sequence

**Difficulty:** Hard

**Topics:** `Principal`, `Math`, `Design`, `Segment Tree`, `Biweekly Contest 37`

Write an API that generates fancy sequences using the `append`, `addAll`, and `multAll` operations.

Implement the `Fancy` class:

- `Fancy()` Initializes the object with an empty sequence.
- `void append(val)` Appends an integer `val` to the end of the sequence.
- `void addAll(inc)` Increments all existing values in the sequence by an integer `inc`.
- `void multAll(m)` Multiplies all existing values in the sequence by an integer `m`.
- `int getIndex(idx)` Gets the current value at index `idx` (0-indexed) of the sequence **modulo** `10⁹ + 7`. If the index is greater or equal than the length of the sequence, return `-1`.


**Example 1:**

- **Input:** 
   ```
   ["Fancy", "append", "addAll", "append", "multAll", "getIndex", "addAll", "append", "multAll", "getIndex", "getIndex", "getIndex"]
   [[], [2], [3], [7], [2], [0], [3], [10], [2], [0], [1], [2]]
   ```
- **Output:** [null, null, null, null, null, 10, null, null, null, 26, 34, 20]
- **Explanation:**
   ```
  Fancy fancy = new Fancy();
  fancy.append(2);   // fancy sequence: [2]
  fancy.addAll(3);   // fancy sequence: [2+3] -> [5]
  fancy.append(7);   // fancy sequence: [5, 7]
  fancy.multAll(2);  // fancy sequence: [5*2, 7*2] -> [10, 14]
  fancy.getIndex(0); // return 10
  fancy.addAll(3);   // fancy sequence: [10+3, 14+3] -> [13, 17]
  fancy.append(10);  // fancy sequence: [13, 17, 10]
  fancy.multAll(2);  // fancy sequence: [13*2, 17*2, 10*2] -> [26, 34, 20]
  fancy.getIndex(0); // return 26
  fancy.getIndex(1); // return 34
  fancy.getIndex(2); // return 20
  ```

**Constraints:**

- `1 <= val, inc, m <= 100`
- `0 <= idx <= 10⁵`
- At most `10⁵` calls total will be made to `append`, `addAll`, `multAll`, and `getIndex`.



**Hint:**
1. Use two arrays to save the cumulative multipliers at each time point and cumulative sums adjusted by the current multiplier.
2. The function `getIndex(idx)` ask the current value **modulo** `10⁹+7`. Use modular inverse and both arrays to calculate this value.






**Solution:**

The solution implements a **lazy propagation** technique using two global variables: a multiplication factor `$mul` and an addition offset `$add`. When a new value is appended, it is stored in a “base” form that, combined with the current `$mul` and `$add`, yields the intended value. Bulk updates (`addAll`, `multAll`) modify only the global factors, avoiding per‑element operations. Retrieval (`getIndex`) recomputes the current value from the stored base and the global factors using modular arithmetic. All operations are **O(1)** (amortized) in time and **O(n)** in space.

### Approach:

- **Global State**  
  Maintain `$mul = 1` and `$add = 0` (modulo _**10⁹+7**_). Keep an array `$values` to store base representations of appended elements.
- **Append**  
  For a new value `$val`, compute its base as  _**base = (val - add) × inv(mul) mod MOD**_, where `inv` is the modular inverse (using Fermat’s theorem because MOD is prime). Append this base to `$values`.
- **Add All**  
  Update `$add = ($add + $inc) % MOD`.
- **Multiply All**  
  Update both factors: `$mul = ($mul * $m) % MOD` and `$add = ($add * $m) % MOD` (addition also scales).
- **Get Index**  
  If `$idx` is out of bounds, return `-1`. Otherwise, compute _**value = (values[idx] × mul + add) mod MOD**_ and return it.
- **Modular Inverse**  
  Implement `modPow(base, exp, MOD)` (fast exponentiation) and use `modPow(x, MOD-2, MOD)` for the inverse.

Let's implement this solution in PHP: **[1622. Fancy Sequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001622-fancy-sequence/solution.php)**

```php
<?php
class Fancy {
    /**
     */
    function __construct() {

    }

    /**
     * Modular exponentiation (fast power)
     *
     * @param int $base
     * @param int $exp
     * @param int $mod
     * @return int
     */
    private function modPow(int $base, int $exp, int $mod): int {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Modular inverse using Fermat's little theorem (mod is prime)
     *
     * @param int $x
     * @return int
     */
    private function modInv(int $x): int {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Appends a new value to the sequence
     *
     * @param Integer $val
     * @return void
     */
    public function append(int $val): void {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Increments all existing values by inc
     *
     * @param Integer $inc
     * @return void
     */
    public function addAll(int $inc): void {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Multiplies all existing values by m
     *
     * @param Integer $m
     * @return void
     */
    public function multAll(int $m): void {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Returns the current value at index idx modulo MOD, or -1 if out of bounds
     *
     * @param Integer $idx
     * @return Integer
     */
    public function getIndex(int $idx): int {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * Your Fancy object will be instantiated and called as such:
 * $obj = Fancy();
 * $obj->append($val);
 * $obj->addAll($inc);
 * $obj->multAll($m);
 * $ret_4 = $obj->getIndex($idx);
 */

// Test cases
$fancy = new Fancy();
$fancy->append(2);                          // [2]
$fancy->addAll(3);                          // [5]
$fancy->append(7);                          // [5, 7]
$fancy->multAll(2);                         // [10, 14]
echo $fancy->getIndex(0) . "\n";            // 10
$fancy->addAll(3);                          // [13, 17]
$fancy->append(10);                         // [13, 17, 10]
$fancy->multAll(2);                         // [26, 34, 20]
echo $fancy->getIndex(0) . "\n";            // 26
echo $fancy->getIndex(1) . "\n";            // 34
echo $fancy->getIndex(2) . "\n";            // 20
?>
```

### Explanation:

- **Lazy Transformation**  
  Every element’s current value is expressed as `base * mul + add`. Bulk operations only change `mul` and `add`; the stored bases remain untouched.
- **Why Base Formula Works**  
  When appending a value `val`, we need `val = base * mul + add` (mod MOD). Solving for base gives `base = (val - add) * inv(mul)`. The inverse exists because `mul` and MOD are coprime (MOD is prime and `mul` is never a multiple of MOD).
- **Impact of Multiply on Add**  
  Multiplying all existing values by `m` also multiplies the additive offset, because `(base * mul + add) * m = base * (mul * m) + (add * m)`.
- **Efficiency**  
  Every operation involves only a few modular arithmetic steps. The modular inverse for each append uses exponentiation with exponent _**10⁹+5**_, which is constant time (~30 multiplications) and well within limits for _**10⁵**_ calls.

### Complexity
- **Time Complexity**:
   - `append`: _**O(log MOD)**_ for modular inverse (effectively constant due to fixed modulus).
   - `addAll`, `multAll`, `getIndex`: _**O(1)**_ each.
   - Overall _**O(1)**_ amortized per operation.
- **Space Complexity**: _**O(n)**_ where `n` is the number of `append` calls, storing one integer per appended element.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**