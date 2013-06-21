#!/bin/bash

directory=/home/www/Adel/include

# Convert

find ${directory} -type f \( -iname "*.prn"  -o -iname "*.php" \) | while read fn; do


sed s/'\&\$'/'$'/ "${fn}" > "${fn}.backup"
rm "${fn}"

mv "${fn}.backup" "${fn}"

done
