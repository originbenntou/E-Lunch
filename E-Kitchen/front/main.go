package main

import (
	"fmt"
	"github.com/gorilla/mux"
	"io"
	"net/http"
)

func main() {
	r := mux.NewRouter()
	r.HandleFunc("/health-check", HealthCheckHandler)
	http.Handle("/", r)

	fmt.Println("ok")
}

// 単なるヘルスチェックAPI
func HealthCheckHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	_, _ = io.WriteString(w, `{"alive": true}`)
}
