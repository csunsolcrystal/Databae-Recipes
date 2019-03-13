# DataBae

### Development environment using Docker
Navigate to same directory as Dockerfile
Build the docker image:

```
docker build . -t databae
```

Once the image is built, run it:

```
docker run --rm --name databaerecipes -p 8000:8000 databae
```
Access it in your browser on `127.0.0.1:8000`

If you want to attach to the container while its running, run:

```
docker exec -it databaerecipes /bin/bash
```

To stop the container:

```
docker container stop databaerecipes
```