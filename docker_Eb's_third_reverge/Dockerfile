FROM python:3.8
LABEL maintainer="Ebounce <3199729962@qq.com>"
WORKDIR /app
COPY ./www /app
COPY ./flag /flag
ENV PYTHONUNBUFFERED=1
ENV DJANGO_SETTINGS_MODULE=snert.settings
RUN pip install  -i https://pypi.tuna.tsinghua.edu.cn/simple -r requirements.txt
RUN python manage.py runserver 0.0.0.0:8000
CMD ["tail","-f","/dev/null"]
