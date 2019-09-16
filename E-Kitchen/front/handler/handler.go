package handler

import (
	"github.com/originbenntou/E-Lunch/E-Kitchen/front/template"
	"io"
	"net/http"
)

func HomeHandler(w http.ResponseWriter, r *http.Request) {
	template.Render(w, "home")
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
