import requests
url = 'https://www.jra.go.jp/JRADB/accessO.html'
response = requests.get(url)
if response.status_code != 200:
    print('Error')
else:
    print('<td class="odds_tan">' in response.text)
