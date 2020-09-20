FROM golang:alpine
MAINTAINER Ebounce <3199729962@qq.com>
WORKDIR /go
COPY ./go/ /go/
ENV GO111MODULE=on
ENV GOPROXY=https://goproxy.cn
ENV GOPATH=''
RUN go mod init condition
RUN go build demo.go
CMD ["./demo"]
