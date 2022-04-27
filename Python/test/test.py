class Person :
    def __init__(self, i, s) :
        self.index = i
        self.name = s
    def greet(self) :
        print(self.name)

data = input().split()
p = Person(int(data[0]), data[1])
p.greet()
