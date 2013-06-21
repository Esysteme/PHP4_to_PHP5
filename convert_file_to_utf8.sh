#!/bin/bash
FROM=iso-8859-1
TO=utf-8
directory=/home/www/Adel
ICONV="iconv -f $FROM -t $TO"
# Convert

find ${directory} -type f \( -iname "*.prn"  -o -iname "*.php" \) | while read fn; do
#find ${directory} -type f \( -iname "*.prn" -o -iname "*.css" -o -iname "*.js" -o -iname "*.php" \) | while read fn; do
#echo ${fn}."\n"
cp "${fn}" "${fn}.bakup"
$ICONV < "${fn}.bakup" > "${fn}"
rm "${fn}.bakup"

done
