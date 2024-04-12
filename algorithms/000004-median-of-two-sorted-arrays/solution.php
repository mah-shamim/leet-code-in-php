class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $mergedArray = [];
        $totalLength = count($nums1) + count($nums2);
        $median = ($totalLength / 2);
        if ($totalLength % 2 === 0) {
            $index = [$median - 1, $median];
        } else {
            $index = [floor($median)];
        }
        $i = 0;
        $i1 = 0;
        $i2 = 0;
        while ($i < $totalLength) {
            if (!isset($nums1[$i1])) {
                $mergedArray[] = $nums2[$i2];
                $i2++;
                $i++;
                continue;
            }
            if (!isset($nums2[$i2])) {
                $mergedArray[] = $nums1[$i1];
                $i1++;
                $i++;
                continue;
            }
            if ($nums1[$i1] < $nums2[$i2]) {
                $mergedArray[] = $nums1[$i1];
                $i1++;
            } else {
                $mergedArray[] = $nums2[$i2];
                $i2++;
            }
            $i++;
        }
        return isset($index[1])
            ? ($mergedArray[$index[0]] + $mergedArray[$index[1]]) / 2
            : $mergedArray[$index[0]];
    }
}