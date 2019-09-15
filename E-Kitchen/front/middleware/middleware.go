package middleware

import (
	"log"
	"net/http"
	"time"
)

const loggingFmt = "Method:%s\tPath:%s\tElapsedTime:%s\tStatusCode:%d\n"

type loggingResponseWriter struct {
	http.ResponseWriter
	statusCode int
}

func Logging(next http.Handler) http.Handler {
	return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		start := time.Now()
		lrw := &loggingResponseWriter{ResponseWriter: w, statusCode: 200}

		defer func() {
			log.Printf(loggingFmt,
				r.Method,
				r.URL.String(),
				time.Since(start),
				lrw.statusCode,
			)
		}()
		next.ServeHTTP(w, r)
	})
}
