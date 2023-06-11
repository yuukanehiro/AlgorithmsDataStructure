package main

import (
	"bytes"
	"fmt"
	"io"
	"os"
	"testing"
)

func main() {
	// 自分の得意な言語で
	// Let's チャレンジ！！
	SplitString()
}

func SplitString() {
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

func TestSplitString(t *testing.T) {
	expected := "He\nlikes\npaiza\n"

	// SplitString() 関数を呼び出す前に標準出力をキャプチャする
	old := redirectStdout()
	// SplitString() 関数を呼び出す
	SplitString()
	// 標準出力結果を取得
	actual := restoreStdout(old)
	if actual != expected {
		t.Errorf("Expected output:\n%s\n\nBut got:\n%s\n", expected, actual)
	}
}

// 標準出力をキャプチャするために一時的に変更する
func redirectStdout() *os.File {
	old := os.Stdout
	_, w, _ := os.Pipe()
	os.Stdout = w
	return old
}

// 標準出力を元に戻す
func restoreStdout(old *os.File) string {
	outC := make(chan string)
	// 出力結果を読み取る
	go func() {
		var buf bytes.Buffer
		io.Copy(&buf, os.Stdout)
		outC <- buf.String()
	}()
	// 標準出力を元に戻す
	os.Stdout = old
	return <-outC
}
