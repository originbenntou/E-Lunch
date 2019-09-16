# k8s 

むずい...
https://ucwork.hatenablog.com/entry/2019/02/27/205709

## 導入

https://cstoku.dev/posts/2018/k8sdojo-02/

- Minikube
- kubectl

## Podデプロイ・削除

```shell script
$ unset KUBECONFIG
$ minikube start

$ kubectl create -f ./k8s/front.yml
$ kubectl get pod

$ kubectl describe pod front

$ kubectl delete front
```

```shell script
kubectl create secret docker-registry sample \
  --docker-server=https://index.docker.io/v1/ \
  --docker-username=okepy \
  --docker-password=pass \
  --docker-email=okepy@example.com
```

```shell script
$ minikube dashboard
```
