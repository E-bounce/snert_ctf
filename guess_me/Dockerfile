FROM golang:alpine
MAINTAINER Ebounce <3199729962@qq.com>
WORKDIR /go
COPY ./go/ /go/
ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8
ENV GO111MODULE=on
ENV GOPROXY=https://goproxy.cn
ENV GOPATH=''
RUN go mod init condition
RUN go build main.go
CMD ["./main"]
