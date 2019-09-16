# html/template

```go
package template

import (
	"html/template"
	"net/http"
)

func Render(w http.ResponseWriter, name string) {
	t := template.Must(template.ParseFiles("/template/" + name + ".tpl"))

	var c interface{}

	t.Execute(w, c)
}
```
