# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right
class Solution:
    def smallestFromLeaf(self, root: Optional[TreeNode]) -> str:
        def DFS(root,str):
            if root is not None:
                if root.left is None and root.right is None:
                    str+=chr(root.val+ord('a'))
                    RevStr = str[::-1]
                    #print("RevStr {}".format(RevStr))
                    return RevStr
                else:
                    str1=DFS(root.left,str+chr(root.val+ord('a')))
                    str2=DFS(root.right,str+chr(root.val+ord('a')))
                    #print("str1 {} , str2 {}".format(str1,str2))
                    if(str1 and str2):
                        return min(str1,str2)
                    elif (str1):
                        return str1
                    else:
                        return str2
            else:
                return ""
        return DFS(root,"")