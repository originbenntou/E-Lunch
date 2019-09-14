# マルチステージビルド

```shell script
$ 
```

## 周辺知識

```shell script
# 一番最後のドットはコンテキストかな modとDockerfileの階層を意識
$ docker build -t front:e-kitchen -f ./front/Dockerfile .

# ときどき忘れる すごく基本
$ docker run -itd front:e-kitchen
$ docker image prune
```
