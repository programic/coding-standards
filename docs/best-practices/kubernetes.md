# Kubernetes best practices 🤝
The following settings and rules must be adhered to for all projects running on our Kubernetes cluster.

## ⚠️ General Rules
- Minimize the number of threads, processes, or workers in a pod to 1 or as low as possible, and instead, increase the number of Pod replicas. This ensures that the autoscaling and redundancy of the cluster are utilized optimally. For `workers` and `backend` pods, this is already specified below.
- In some (older) projects, Pods may have custom settings. `Memory requested` should be set close to the average usage — preferably slightly below — to avoid wasting reserved resources. `Memory limit` should account for long-term peaks, as it is a hard limit.
- In case of system slowdowns, increase Pod replicas instead of adjusting memory settings.

## Pod and project configuration

### 💪🏻 Workers
```
Pod replicas:            2
Memory requested:        256MB
Memory limit:            2048MB
```
#### Project configuration:
```
Horizon maxProcesses:    1
```

### ⏱️ Schedulers
```
Pod replicas:            1
Memory requested:        64MB
Memory limit:            512MB
```
> ⚠️ The scheduler should only queue tasks for workers and avoid running heavy async scripts itself. This keeps it lightweight while workers handle execution, ensuring scalability and redundancy.

### 👾 Backend
```
Pod replicas:            2
Memory requested:        128MB
Memory limit:            1024MB
```
#### Project configuration:
```
FrankenPHP workers:      1
```

### 🎨 Frontend
```
Pod replicas:            2
Memory requested:        16MB
Memory limit:            64MB
```