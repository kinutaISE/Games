dp_table = [[]]
weights = []
def dp_search(k, w):
    # 残量 w(g) に対して，weights[k] を入れるか入れないか
    if k == 0:
        if weights[0] == w:
            dp_table[k][w] = 0
        else:
            dp_table[k][w] = w
        return
    if weights[k] == w:
        dp_table[k][w] = 0
        return
    if dp_table[k - 1][w] == -1:
        dp_search(k - 1, w)
    dp_table[k][w] = dp_table[k - 1][w]
    if weights[k] > w:
        return
    if dp_table[k - 1][ w - weights[k] ] == -1:
        dp_search(k - 1, w - weights[k] )
    if dp_table[k - 1][ w - weights[k] ] == 0:
        dp_table[k][w] = 0

limit = 1500 # 上限（1.5kg）
# 入力の受け取り，ソーティング
weights = [ int(data) for data in input().split() ]
weights.sort()
n = len(weights)
# dp表の初期化
dp_table = [ [ -1 for i in range( limit + 1 ) ] for j in range(n) ]
# 動的計画法
dp_search( n - 1, limit )

if dp_table[ n - 1 ][ limit ] == 0:
    print('yes')
else:
    print('no')
