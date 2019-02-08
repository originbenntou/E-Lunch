E-Lunch
======================

E-Lunchでイイランチ

## URL

https://www.e-lunch.info/

### 稼働時間

月曜 ~ 金曜
11:00 ~ 14:00

### 構成

#### フロント

- Node.js
- TypeScript
- Vue.js
- Webpack
- Socket.io
- dotenv
- jQuery
- NeDB

#### バックエンド

- Nginx
- go
- dep
- MySQL
- Docker
- Kubernetes

## ローカル環境構築

### clone

#### 関連リポジトリ

- [E-Serve]()
    - E-Lunchフロントエンド
- [E-Pantry]()
    - E-Lunchバックエンド（CMS）

```
$ git@github.com:originbenntou/E-Lunch.git

# submodule最新化
$ git submodule init
$ git submodule update
```

### docker

```
$ docker-compose up
```

### kubernetes

```
hogehoge
```

#### ログ管理
fa~

#### パッケージ管理
yarnにしたいな〜

## ローカル開発環境構築
```
$ npm run build:dev
$ npm run dev
```

GPL ライセンス
--------
E-Lunch is made with originbenntou, newnakashima, AkinoIkumi
