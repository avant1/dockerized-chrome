# Dockerized chrome example

```bash
#run selenium hub and chrome
docker-compose up -d

#create selenium session, visit page and take screenshot
docker-compose run php ./cli.php 
```

Run `docker-compose stop && docker-compose up -d` in case of not proper session stop (Ctrl+C).
Subsequent session start may hang forever if previous one was not stoppped correctly.
