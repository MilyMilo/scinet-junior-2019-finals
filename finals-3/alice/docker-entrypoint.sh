#!/bin/bash

while true; do
    nc -l -p 36194 -c "java -jar /app/ai.jar 2>/dev/null"
done