class Solution {

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLastWord($s) {
    $length = 0;
    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        if ($s[$i] == ' ') {
            if ($length) {
                break;
            }
        } else {
            $length += 1;
        }
    }
    return $length;
}
}