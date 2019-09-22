package handler

import (
	"github.com/originbenntou/E-Lunch/E-Kitchen/front/template"
	"io"
	"log"
	"net/http"
)

func HomeHandler(w http.ResponseWriter, r *http.Request) {
	template.Render(w, "home")
}

func SignupHandler(w http.ResponseWriter, r *http.Request) {
	template.Render(w, "signup")
}

func UserRegisterHandler(w http.ResponseWriter, r *http.Request) {
	r.ParseForm()
	log.Println(r.Context())
}

func LoginHandler(w http.ResponseWriter, r *http.Request) {
	template.Render(w, "login")
}

// 単なるヘルスチェックAPI
func HealthCheckHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	_, _ = io.WriteString(w, `{"alive": true}`)
}
