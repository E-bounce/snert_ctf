from flask import Flask
from flask import render_template,request
from jinja2 import Template
import re
app = Flask(__name__, template_folder='templates')

compression = r"\"|ca|mor|hea|tai|\{%|\\"

def black_list(string):
    global compression
    print(re.findall(compression,string))
    if re.findall(compression,string):
        return "非法输入"
    else:
        return string

@app.route('/')
def index():
    return render_template("./index.html",list=compression)

@app.route('/UF1agS/',methods=["GET"])
def flag():
    try:
        payload = black_list(request.args.get("payload"))
        My_template = Template("Your Input String is "+payload)
        return My_template.render()
    except Exception as e:
        print(e)
        return "Input something or Input right thing!"

if __name__ == '__main__':
    app.run(host="0.0.0.0",port=8042)

