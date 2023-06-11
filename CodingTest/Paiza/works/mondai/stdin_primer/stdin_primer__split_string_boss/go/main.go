package main

import "fmt"

func main() {
	// 自分の得意な言語で
	// Let's チャレンジ！！
	var words = [...]string{
		"one",
		"two",
		"three",
		"four",
		"five",
	}
	for _, word := range words {
		fmt.Println(word)
	}
}
