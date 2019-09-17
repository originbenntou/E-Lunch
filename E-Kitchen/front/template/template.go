package template

import (
	"html/template"
	"net/http"
)

func Render(w http.ResponseWriter, name string) {
	t := template.Must(template.ParseFiles("/template/layout.tpl", "/template/header.tpl", "/template/"+name+".tpl"))

	var c interface{}

	if err := t.ExecuteTemplate(w, "layout", c); err != nil {
		panic(err)
	}
}
