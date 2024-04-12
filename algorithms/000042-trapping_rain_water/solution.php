class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $result = 0;
        $leftIndex = 0;
        $rightIndex = count($height) - 1;
        $maxLeft = 0;
        $maxRight = 0;
        while ($leftIndex < $rightIndex) {
            if ($height[$leftIndex] < $height[$rightIndex]) {
                $maxLeft = max($maxLeft, $height[$leftIndex]);
                $result += $maxLeft - $height[$leftIndex];
                $leftIndex++;
            } else {
                $maxRight = max($maxRight, $height[$rightIndex]);
                $result += $maxRight - $height[$rightIndex];
                $rightIndex--;
            }
        }
        return $result;
    }
}