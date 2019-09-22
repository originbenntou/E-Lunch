package main

import (
	"github.com/gorilla/mux"
	"github.com/originbenntou/E-Lunch/E-Kitchen/front/handler"
	"github.com/originbenntou/E-Lunch/E-Kitchen/front/middleware"
	"log"
	"net/http"
)

const port = ":8080"

func main() {
	r := mux.NewRouter()

	r.Use(middleware.Logging)

	r.Path("/").Methods(http.MethodGet).HandlerFunc(handler.LoginHandler)
	r.Path("/signup").Methods(http.MethodGet).HandlerFunc(handler.SignupHandler)
	r.Path("/user-register").Methods(http.MethodPost).HandlerFunc(handler.UserRegisterHandler)
	r.Path("/home").Methods(http.MethodGet).HandlerFunc(handler.HomeHandler)
	r.Path("/health-check").Methods(http.MethodGet).HandlerFunc(handler.HealthCheckHandler)

	http.Handle("/", r)

	log.Println("start server on port", port)
	log.Fatal(http.ListenAndServe(port, nil))
}
