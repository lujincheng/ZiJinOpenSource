class BinaryTreeNode:
    def __init__(self, data):
        # 初始化一个二叉树节点，包括节点数据和左右子节点
        self.data = data
        self.left = None
        self.right = None

class BinaryTree:
    def __init__(self):
        # 初始化一个空根节点
        self.root = None

    def is_empty(self):
        # 检查二叉树是否为空
        return self.root is None

    def insert(self, data):
        # 将一个节点插入到二叉树中
        node = BinaryTreeNode(data)
        if self.is_empty():
            # 如果二叉树为空，则将该节点设置为根节点
            self.root = node
        else:
            # 否则，查找正确的位置并插入节点
            current = self.root
            while True:
                if data < current.data:
                    if current.left is None:
                        current.left = node
                        break
                    current = current.left
                else:
                    if current.right is None:
                        current.right = node
                        break
                    current = current.right

    def search(self, data):
        # 在二叉树中搜索一个节点
        current = self.root
        while current is not None:
            if data == current.data:
                return current
            elif data < current.data:
                current = current.left
            else:
                current = current.right
        return None

    def delete(self, data):
        # 在二叉树中删除一个节点
        node = self.search(data)
        if node is None:
            return
        parent = self._get_parent(node)
        if node.left is None and node.right is None:
            if parent is None:
                self.root = None
            elif parent.left == node:
                parent.left = None
            else:
                parent.right = None
        elif node.left is None:
            if parent is None:
                self.root = node.right
            elif parent.left == node:
                parent.left = node.right
            else:
                parent.right = node.right
        elif node.right is None:
            if parent is None:
                self.root = node.left
            elif parent.left == node:
                parent.left = node.left
            else:
                parent.right = node.left
        else:
            successor = self._get_min(node.right)
            node.data = successor.data
            self.delete(successor.data)

    def _get_parent(self, node):
        # 获取一个节点的父节点
        current = self.root
        parent = None
        while current is not None:
            if current == node:
                return parent
            elif node.data < current.data:
                parent = current
                current = current.left
            else:
                parent = current
                current = current.right
        return None

    def _get_min(self, node):
        # 获取一个子树中的最小节点
        current = node
        while current.left is not None:
            current = current.left
        return current
