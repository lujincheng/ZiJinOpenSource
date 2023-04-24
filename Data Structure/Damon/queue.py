class Queue:
    def __init__(self):
        # 初始化一个空列表作为队列
        self.items = []

    def is_empty(self):
        # 检查队列是否为空
        return len(self.items) == 0

    def enqueue(self, item):
        # 将一个元素添加到队列的末尾
        self.items.append(item)

    def dequeue(self):
        if self.is_empty():
            # 如果队列为空，则返回 None
            return None
        # 从队列的头部移除一个元素，并返回它
        return self.items.pop(0)

    def size(self):
        # 返回队列的大小
        return len(self.items)
