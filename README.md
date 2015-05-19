WhatsApp-Tracker
================

- A tool that checks the last time online whether the user has enabled or disabled the last seen time.

![WATracker](http://cl.ly/image/1P331F2S3q0b/watracker.png)

----------

### What is WhatsApp Tracker?

It's a tool that allows to track when the user is online or offline, wether the user has the "last seen" hidden or not. For users who have active the last time online, it is not very useful, as anyone can see when was the last time he was online. But this tool also lets you know when was the last time of a user with 'last online' hidden.

There are currently two ways to display the user's last seen time, by screen or remotely. Remotely will send you a log of the user you are tracking.

It is based on [Chat API](https://github.com/mgp25/Chat-API)


### The reason for this script?

More than anything to show that there is no privacy and can automate monitoring of any user.

***Honestly***, there are clients with better privacy.

### Commands

php watracker.php

A list of commands that the program currently has:

- ***-check < number >*** It shows on screen the last time the user was online every minute. (only works for users who have their last seen visible).
- ***-cRemote0 < yourNumber > < number >*** It shows on screen and send a message to the mobile you assign the log of the last time the user was online every minute. (only works for users who have their last seen visible).
- ***-cHidden < number >*** It shows on screen the last time the user was online. (Works for all users, focused to those who has the last seen time hidden).
- ***-cRemote1 < yourNumber > < number >*** It shows on screen and send a message to the mobile you assign the log of the last time the user was online. (Works for all users, focused to those who has the last seen time hidden).
