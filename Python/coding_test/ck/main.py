# ファイル読み込みとペアを保管する二次元リストの作成
f = open('pairs.txt', 'r')
pairs = [ [] for i in range(12) ]
lines = f.readlines()
for line in lines:
    data = [ int(id) for id in line.split() ]
    pairs[ data[0] ].append(data[1])
    pairs[ data[1] ].append(data[0])
# 検索する食材の受け取り
id_searced = int(input())
# 相性の良い食材の相性の良い食材の集合を作成
set_searched = set()
for p in pairs[id_searced]:
    for pp in pairs[p]:
        set_searched.add(pp)
# 自身を除く
set_searched.remove(id_searced)
# 出力
print(set_searched)
