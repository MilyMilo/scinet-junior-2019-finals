FROM python:3.7.4-alpine

RUN apk update \
  && apk add --update --no-cache git openssh-client \
  && pip install pipenv \
  && addgroup -S -g 1001 fred \
  && adduser -s /bin/sh -S -D -h /home/fred -u 1001 -G fred fred  \
  && mkdir -p /home/fred/app \
  && chown fred:fred -R /home/fred

RUN mkdir -p /opt/notifier \
  && echo "echo \`date\` >> /opt/notifier/notifier.log # TODO: Finish notifier logic" >> /opt/notifier/notifier.sh \
  && chmod +x /opt/notifier/notifier.sh \
  && (crontab -u root -l 2>/dev/null; echo "*/2 * * * * /bin/sh /opt/notifier/notifier.sh >/dev/null 2>&1") | crontab -u root - \
  && chmod 777 /opt/notifier/notifier.sh

WORKDIR /home/fred/app
COPY --chown=fred:fred . .

# kind of hacky but works
RUN su -c "cd /home/fred/app && pipenv install" - fred
CMD crond && su -c "cd /home/fred/app && pipenv run gunicorn --bind 0.0.0.0:8000 --access-logfile - app:app" - fred
