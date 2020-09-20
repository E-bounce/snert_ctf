package main

import (
	"fmt"
	"github.com/gin-gonic/gin"
	"io/ioutil"
	"os"
	"strconv"
)

func ReadFlag()(string,error){
	dir, err := os.Getwd()
	if err != nil {
		fmt.Println(err)
	}
	R_Flag, err := ioutil.ReadFile(dir+"/flag")
	if err != nil {
		fmt.Println(err)
		return string(R_Flag),err
	}
	return string(R_Flag),err
}//这里只是读flag

func change_num(u,g *int,add int){
	if add<=20 && add > 0 {
		*g += add
		*u += add
	}else {
		add = 1
		*g += add
		*u += add
	}
	if *g >= 500 || *u >= 500 {
		*g = 0
		*u = 0
	}
}

func main() {
	var g int = 0
	YourFlag, _ := ReadFlag()
	router := gin.Default()
	router.GET("/", func(c *gin.Context) {
		num, _ := strconv.Atoi(c.DefaultQuery("add", "1"))
		temp := g
		change_num(&g,&temp,num)
		fmt.Println(temp,g)
		if temp != g {
			c.JSON(200,gin.H{
				"flag" : YourFlag,
			})
		}else {
			c.JSON(200,gin.H{
				"message": "你与flag擦肩而过",
			})
		}
	})
	router.Run(":8080")
}
