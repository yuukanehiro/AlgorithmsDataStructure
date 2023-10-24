package main

import (
	"database/sql"
	"fmt"
	"log"
	"strings"

	_ "github.com/go-sql-driver/mysql"
)

type Node struct {
	NodeID     int
	Name       string
	Ancestor   int
	Descendant int
	PathLength int
	Children   []*Node
}

const (
	dbUser     = "user"
	dbPassword = "password"
	dbName     = "closuretabledb"
	dbHost     = "db"
	dbPort     = "3306"
)

func main() {
	dsn := fmt.Sprintf("%s:%s@tcp(%s:%s)/%s?charset=utf8mb4&parseTime=True&loc=Local",
		dbUser, dbPassword, dbHost, dbPort, dbName)

	db, err := sql.Open("mysql", dsn)
	if err != nil {
		log.Fatalf("Failed to connect to the database: %v", err)
	}
	defer db.Close()

	// Fetch rows from the database
	rows, err := db.Query("SELECT node_id, name, ancestor, descendant, path_length FROM nodes")
	if err != nil {
		log.Fatalf("Failed to fetch rows: %v", err)
	}
	defer rows.Close()

	nodes := []Node{}
	for rows.Next() {
		var node Node
		err = rows.Scan(&node.NodeID, &node.Name, &node.Ancestor, &node.Descendant, &node.PathLength)
		if err != nil {
			log.Fatalf("Failed to scan row: %v", err)
		}
		nodes = append(nodes, node)
	}

	tree := make(map[int]*Node)

	// 1. 全てのノードをtreeに初めに格納する
	for i := range nodes {
		tree[nodes[i].NodeID] = &nodes[i]
	}

	// 2. 子ノードを関連付ける
	for _, node := range nodes {
		if node.PathLength != 0 {
			tree[node.Ancestor].Children = append(tree[node.Ancestor].Children, tree[node.NodeID])
		}
	}

	// 表示
	for _, node := range tree {
		if node.PathLength == 0 {
			displayTree(node, 0)
		}
	}
}

func displayTree(node *Node, level int) {
	fmt.Println(strings.Repeat("--", level) + node.Name)
	for _, child := range node.Children {
		displayTree(child, level+1)
	}
}
