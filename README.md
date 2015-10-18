WhatsApp-Tracker
================

- A tool that checks the last time online whether the user has enabled or disabled the last seen time.

![WATracker](http://cl.ly/image/1P331F2S3q0b/watracker.png)


----------

### Donate

**Do you like this project? Support it by donating**
- ![btc](https://camo.githubusercontent.com/4bc31b03fc4026aa2f14e09c25c09b81e06d5e71/687474703a2f2f7777772e6d6f6e747265616c626974636f696e2e636f6d2f696d672f66617669636f6e2e69636f) Bitcoin: 1BEB8ugaKQxPRTGtgPp92aEtinT3jLVj1A
- ![pp](https://raw.githubusercontent.com/reek/anti-adblock-killer/gh-pages/images/paypal.png) Paypal: [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R9J2UVKUP8X8S)

### Dependencies

`php sockets and mcrypt`

### What is WhatsApp Tracker?

It's a tool that allows to track when the user is online or offline, wether the user has the "last seen" hidden or not. For users who have active the last time online, it is not very useful, as anyone can see when was the last time he was online. But this tool also lets you know when was the last time of a user with 'last online' hidden.

There are currently two ways to display the user's last seen time, by screen or remotely. Remotely will send you a log of the user you are tracking.

It is based on [Chat API](https://github.com/mgp25/Chat-API)


### The reason for this script?

More than anything to show that there is no privacy and can automate monitoring of any user.

***Honestly***, there are clients with better privacy.

### Commands

```
php watracker.php
```

A list of commands that the program currently has:

- ***< numberToTrack >*** It shows on screen the last time the user was online every minute. 
- ***< numberToTrack > < yourNumber >*** It shows on screen and send a message to the mobile you assign, the log of the last time the user was online every minute.

Example:
```
php watracker.php 34123456789
```

Or

```
php watracker.php 34123456789 34987654321
```

### F.A.Q.

- How to obtain WhatsApp password

You can obtain it here: http://www.watools.es/pwd.html

Or using [WART](https://github.com/mgp25/WART)
