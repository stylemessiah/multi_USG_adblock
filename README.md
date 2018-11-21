# Multi_USG_Adblock

Adblocking on Ubiquiti Unifi equipment using a script on cloud server to create a centralised dnsmasq blacklist,
using contributed widely available blacklists (user settable) which the Ubiquiti USG's at multiple locations poll 
for changes at user set intervals, download the dnsmasq blacklist, and user maintained whitelist, if changed, and apply them to the Ubiquiti USG's.

There are php files to easily allow user maintenance of user white/black lists.

All your require is a web server, and admin access to the Ubiquiti USG. 

The scripts do not in any way need access to, integrate with, or require changes to the Unifi Controller software,
apart from an entry in the config.gateway.json to set a script to run on a user selectable schedule. Adding this
via config.gateway.json will ensure the script survives a USG firmware update.

It should go without saying this is 3rd party software i developed for my own personal use. 

Disclaimer:

If you choose to download any file from my repository and use it any way, both in ways outlined by me, or in ways
i did not envisage, you do so at your own risk. I will not be liable for any damages incurred by the proper or improper
use of any shared file or instruction.

Always make a backup of critical files before running any script.

It is recommended, and please free free, to read through the shell scripts and php code, i have commented it pretty 
exhaustively to make sure its well documented and so that its clear theres nothing nefarious contianed within.
