class Solution {

    /**
    * @param Integer[][] $nums1
    * @param Integer[][] $nums2
    * @return Integer[][]
    */
    function mergeArrays($nums1, $nums2) {
        $result = [];
        $i = $j = 0;
        while ($i < count($nums1) || $j < count($nums2)) {
            if ($j == count($nums2) || ($i < count($nums1) && $nums1[$i][0] < $nums2[$j][0])) {
                if ($result && $result[count($result) - 1][0] == $nums1[$i][0]) {
                    $result[count($result) - 1][1] += $nums1[$i][1];
                } else {
                    $result[] = $nums1[$i];
                }
                $i++;
            } else {
                if ($result && $result[count($result) - 1][0] == $nums2[$j][0]) {
                    $result[count($result) - 1][1] += $nums2[$j][1];
                } else {
                    $result[] = $nums2[$j];
                }
                $j++;
            }
        }
        return $result;
    }
}