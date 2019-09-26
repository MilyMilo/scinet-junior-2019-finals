FROM python:3.7.4-alpine

RUN apk update \
  && apk add --no-cache git openssh-client \
  && pip install pipenv \ 
  && addgroup -S -g 1001 fred \
  && adduser -S -D -h /home/fred -u 1001 -G fred fred \
  && mkdir -p /home/fred/ftp \
  && chown fred:fred /home/fred/ftp 

USER fred
WORKDIR /home/fred/ftp

COPY --chown=fred:fred . .
RUN pipenv install

CMD pipenv run python3 server.py
