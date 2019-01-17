FROM golang:1.11.4

# go get を実行させるためGOBINのPATHを通しておく
ENV GOBIN /go/bin

COPY E-Pantry/app/go /go/src/app/
WORKDIR /go/src/app/

# FIXME: dep ensureが動いていない
RUN go get -u github.com/golang/dep/cmd/dep \
    && dep ensure

CMD go run main.go
