import requests
import json

# エンドポイント
url = 'https://static.cookpad.com/hr/screen/news/index.json'
# リクエスト
res = requests.get(url)
# 取得したjsonをlists変数に格納
lists = json.loads(res.text)
for list in lists:
    url_comment = 'https://static.cookpad.com/hr/screen/news/comments/' + str(list['id']) + '.json'
    res_comment = requests.get(url_comment)
    if res_comment.status_code == 404:
        continue
    lists_comment = json.loads(res_comment.text)
    list['comments'] = [ c['body'] for c in lists_comment['comments'] ]
print(lists)
