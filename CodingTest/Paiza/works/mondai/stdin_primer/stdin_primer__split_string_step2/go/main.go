package main

import "fmt"

func main() {
	// 自分の得意な言語で
	// Let's チャレンジ！！
	var words = [...]string{
		"He",
		"likes",
		"paiza",
	}
	for _, word := range words {
		fmt.Println(word)
	}
}
