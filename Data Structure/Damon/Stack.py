class Stack:
    def __init__(self):
        # 初始化一个空列表作为栈
        self.items = []

    def is_empty(self):
        # 检查栈是否为空
        return len(self.items) == 0

    def push(self, item):
        # 将一个元素添加到栈顶
        self.items.append(item)

    def pop(self):
        if self.is_empty():
            # 如果栈为空，则返回 None
            return None
        # 从栈顶弹出一个元素，并返回它
        return self.items.pop()

    def size(self):
        # 返回栈的大小
        return len(self.items)
