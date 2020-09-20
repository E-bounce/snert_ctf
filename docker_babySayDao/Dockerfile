FROM golang:latest
MAINTAINER Ebounce <3199729962@qq.com>
WORKDIR /go
COPY ./exe/ /go/
ENV GO111MODULE=on
ENV GOPROXY=https://goproxy.cn
ENV GOPATH=''
RUN go mod init veryeasy
RUN go build main.go
CMD ["./main"]
