FROM golang:1.11.4

# go get を実行させるためGOBINのPATHを通しておく
ENV GOBIN /go/bin

COPY E-Pantry/app/go /go/src/app/
WORKDIR /go/src/app/

RUN go get -u github.com/golang/dep/cmd/dep \
    && go get -u firebase.google.com/go \
    && go get -u google.golang.org/api/option \
    && dep ensure

CMD go run main.go
