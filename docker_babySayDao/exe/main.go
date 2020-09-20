package main

import (
	"bytes"
	"fmt"
	"github.com/gin-gonic/gin"
	"os/exec"
	"regexp"
)

const re_parse = "(a-z){3,}|[A-Z0-9 -$;|&%.]"

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
func main(){
	router := gin.Default()
	router.GET("/", func(c *gin.Context) {
		 command,ok := c.GetQuery("string")
		 fmt.Println(command)
		if ok {
			result := check_exec(command)
			c.JSON(200,gin.H{
				"result":result,
			})
		}else {
			c.JSON(200,gin.H{
				"result": "输入Something!",
			})
		}
		})
	router.Run(":8080")
}
