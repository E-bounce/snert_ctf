FROM python:3-alpine
MAINTAINER "Ebounce <root@3199729962@qq.com>"
ADD ./web/ /usr/src/app
WORKDIR /usr/src/app
RUN pip install --no-cache-dir -r requirements.txt
CMD ["python3","app.py"]
