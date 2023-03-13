#!/bin/sh

PASS=true
var=$(composer run lint)
if [ "$?" -eq 1 ]; then
    PASS=false
fi
DIFF='begin diff'
if [[ "$var" == *"$DIFF"* ]]; then
  echo "have diff"
  printf '%b' "$var"
  PASS=false
fi
if [ "$PASS" = "false" ]; then  
    exit 1
fi