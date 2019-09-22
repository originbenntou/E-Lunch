FROM golang:latest as builder

ENV WORK_DIR /go/src/github.com/originbenntou/E-Kitchen
ENV MAIN_PATH $WORK_DIR/front

WORKDIR $WORK_DIR

ENV GO111MODULE on
COPY go.mod .
COPY go.sum .
RUN go mod download

COPY . $WORK_DIR
COPY ./front/template /template

WORKDIR $MAIN_PATH

RUN go get github.com/pilu/fresh
CMD ["fresh", "$MAIN_PATH"]
