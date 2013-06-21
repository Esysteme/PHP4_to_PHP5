#!/bin/bash


directory=/home/www/Adel
find ${directory} -type f \( -iname "*.prn"  -o -iname "*.php" \) | while read fn; do
php check_and_replace.php ${fn}
done
