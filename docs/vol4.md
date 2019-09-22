# skaffold

実行環境は適宜インストールしておく

```shell script
$ skaffold dev
```

```
apiVersion: skaffold/v1beta14
kind: Config
build:
  artifacts:
    # イメージ名、skaffold実行時につけられる
    - image: originbenntou/e-kitchen-front
      # skaffold.ymlからみて、実行Dirをどこにするか
      context: ./E-Kitchen
      # 実行DirからDokerfileがどこにあるか
      docker:
        dockerfile: ./front/Dockerfile
deploy:
  kubectl:
    manifests:
      # k8sのymlをどうするか
      - ./E-Kitchen/kubernetes/*
# よくわかってない、けどkubectlがうまく打てないのでAPIサーバーの設定かと
portForward:
  - resourceType: deployment
    resourceName: leeroy-web
    port: 8080
    localPort: 9000
```

TODO: dep.yamlがローカルイメージを参照してくれるようになってほしい
