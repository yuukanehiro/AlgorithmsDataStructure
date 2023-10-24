FROM golang:1.20-alpine as deploy-builder

ENV APP_NAME=main
ENV ROOT=/go/src/app

COPY ./ ${ROOT}
WORKDIR ${ROOT}

RUN apk update && \
  apk --no-cache add git postgresql-client

ARG CGO_ENABLED=0
ARG GOOS=linux
ARG GOARCH=amd64
RUN set -eux && \
  go mod tidy && \
  go build main.go
