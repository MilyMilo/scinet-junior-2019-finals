FROM openjdk:8-jre-slim

WORKDIR /app
COPY . .

RUN apt-get update && apt-get install netcat -y && chmod +x /app/docker-entrypoint.sh

EXPOSE 55555

CMD ["./docker-entrypoint.sh"]