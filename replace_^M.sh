cat filename | tr "\r" "\n" > newfilename

BTW, you can do it without the cat and pipe like this:

tr '\r' '\n' < inputfile > outputfile
