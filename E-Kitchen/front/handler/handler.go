package handler

import (
	"github.com/originbenntou/E-Lunch/E-Kitchen/front/template"
	"net/http"
)

func HomeHandler(w http.ResponseWriter, r *http.Request) {
	template.Render(w, "home")
}

func LoginHandler(w http.ResponseWriter, r *http.Request) {
	template.Render(w, "login")
}
