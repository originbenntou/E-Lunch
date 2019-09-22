# Go module

### 事前準備

```shell script
# リポジトリ上のsrcをもってくる
$ cd GOPATH/src/
$ git clone git@github.com:originbenntou/E-Lunch.git
```

ローカルでsum作っとかないとコンテナ上でビルドできない

```shell script
# go sum 生成
$ export GO111MODULE=on
$ go build ./front/main.go

# importするものをmodに追加した上でsumを作ってくれる
# バイナリもできる、けどコンテナ上でビルドするのでいらん
```

# マルチステージビルド

```shell script
$ docker build -t front:e-kitchen -f ./front/Dockerfile .

$ docker run -itd front:e-kitchen
ok
```

## 周辺知識

```shell script
# 一番最後のドットはコンテキストかな modとDockerfileの階層を意識して書く
$ docker build -t originbenntou/e-kitchen-front:1.0.0 -f ./front/Dockerfile .

# /go/bin配下にバイナリをつくってくれる
$ go install
# 実行パス、またはオプション指定の場所にバイナリをつくる
$ go build
## 基本的にinstall推奨 /go/binのパスを通しておけばどこからでもバイナリを実行できる

# すごく基本
$ docker run -p 80:8080 originbenntou/e-kitchen-front:1.0.0

# kubeはdocker hubからpullするのでpushを忘れずに....
$ docker push originbenntou/e-kitchen-front:1.0.0
```


