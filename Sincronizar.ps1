$m=read-host -mpromt "introduce mensaje"
git add .
git commit -m $m
git push --force origin main