# k8s 

## 導入

あらかじめ以下をインストールしておく

- Minikube
- kubectl

## docker hub

```shell script
$ docker login

$ docker build -t originbenntou/e-kitchen-front:1.0.0 -f ./front/Dockerfile .
$ docker push originbenntou/e-kitchen-front:1.0.0 
```

## デプロイ

以下を参考にデプロイする
https://ucwork.hatenablog.com/entry/2019/02/27/205709

```shell script
$ unset KUBECONFIG
$ minikube start

$ kubectl create -f ./k8s/deployment.yml
$ kubectl apply -f ./k8s/ingress.yml

$ kubectl delete -f ./k8s/deployment.yml

$ kubectl exec -it nginx-7ff6987955-c27tn sh

$ minikube dashboard

$ curl http://`minikube ip`/home -H 'Host: nginx.ucwork.local'
```

```shell script
# どのk8sクラスタを利用するか決める 今回はminikube
$ kubectl config get-contexts
$ kubectl config use context minikube
```
