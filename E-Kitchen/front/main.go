package main

import (
	"github.com/gorilla/mux"
	"github.com/originbenntou/E-Lunch/E-Kitchen/front/handler"
	"github.com/originbenntou/E-Lunch/E-Kitchen/front/middleware"
	"io"
	"log"
	"net/http"
)

const port = ":8080"

func main() {
	r := mux.NewRouter()

	r.Use(middleware.Logging)

	r.HandleFunc("/", handler.LoginHandler)
	r.HandleFunc("/home", handler.HomeHandler)
	r.HandleFunc("/health-check", HealthCheckHandler)

	http.Handle("/", r)

	log.Println("start server on port", port)
	log.Fatal(http.ListenAndServe(port, nil))
}

// 単なるヘルスチェックAPI
func HealthCheckHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	_, _ = io.WriteString(w, `{"alive": true}`)
}
