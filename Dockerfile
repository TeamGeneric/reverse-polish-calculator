##
# Dockerfile to run example.php
##
FROM php:7.0-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./example.php" ]

##
# Usage
##

##
# Build Images & Run
##

# $ docker build -t reverse-polish-calculator .
# $ docker run -it --rm --name RPN_app reverse-polish-calculator


##
# Remove Image
##

# $ docker images
# $ docker rmi reverse-polish-calculator
# $ docker images