package main

import (
	"bytes"
	"github.com/gin-gonic/gin"
	"math/rand"
	"net/http"
	"os/exec"
	"regexp"
	"strconv"
)

const re_parse = "([a-z]){2}|[A-Z?*$#\\\\]"

func my_exec(exec_string string)(string){
	var stdout bytes.Buffer
	cmd := exec.Command("/bin/bash","-c",exec_string)
	cmd.Stdout = &stdout
	err := cmd.Run()
	if err != nil{
		return "something wrong"
	}

	return stdout.String()
}

func get_rand() (result int) {
	seed := rand.Int63n(998)
	rand.Seed(seed)
	for i := 0; i <=7; i++ {
		result = rand.Intn(666)
	}
	return
}
func check_exec(v string) string {
	re_object := regexp.MustCompile(re_parse)
	var result bool
	if re_object == nil {
		return "something wrong"
	}
	result = re_object.MatchString(v)
	if !result {
		return my_exec(v)
	}
	return "该字符串不允许输入"
}
//flag in YOURFLAG
func main(){
	router := gin.Default()
	router.LoadHTMLFiles("./templates/index.tmpl")
	guess_number := get_rand()
	router.GET("/", func(c *gin.Context) {
		var message string = "快乐猜猜乐，具体需要猜什么你就找找吧"
		num := c.Query("rand")
		random_num,err := strconv.Atoi(num)
		command := c.Query("command")
		switch{
		case err!=nil && len(num)!=0:
			message = "记得输入一个数字哦～"
		case err==nil && guess_number != random_num:
			message = "猜错了～"
		case err==nil && guess_number == random_num:
			if len(command)==0 {
				message = "恭喜你猜对了，奖励是可以输入一串字符串记得用GET"
			}else {
				message = "结果为-> "+check_exec(command)
			}
		}
		c.HTML(http.StatusOK,"index.tmpl",gin.H{
			"message" :message,
		})
	})
	router.Run(":8080")
}