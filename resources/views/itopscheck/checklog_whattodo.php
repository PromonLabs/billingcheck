<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<h3>WHAT TO DO<h3></h1>
<br>
last
<br>
cat /var/log/secure* | grep ssh | grep Accept
<br>
cat /var/log/secure* |grep ftp |grep Accept
<br>
less /var/log/messages | grep ftp
<br>
cat /var/log/syslog  (if any)
<br>
<br>
=========================================================================
<br>
#last | grep -v boot | awk '{ print $3 }' | sort | uniq
<br>
#grep -v Session  messages* | grep -v Clean
<br>
#grep SU /var/log/messages*
<br>
=========================================================================
<br>
<br>

Watch current connections and scan your ports.

<br>
<br>
Code:
<br>
<br>

netstat -nalp
<br>
nmap -sT -T normal -p 1-65535 localhost
<br>
<br>

Checking for anomalies on this files.
<br>
<br>
Code:
<br>

less /etc/passwd
<br>
less /etc/shadow
<br>
less /etc/groups
<br>
<br>

Search for new users at sudoers, check wtmp and telnet is not running.
<br>
<br>

Code:
<br>

cat /etc/sudoers
<br>
who /var/log/wtmp
<br>
cat /etc/xinetd.d/telnet
<br>
<br>

Find bash history files
<br>

Code:

<br>
find ‘/’ -iname .bash_history

<br>
<br>
Verify the Crontab table

<br>
Code:

<br>
crontab -l


<br>

<br>
<br>
Search for hidden dirs
  
<br>
<br>
Code:

<br>
locate “…”
<br>
locate “.. ”
<br>
rlocate ” ..”
<br>
locate “. ”
<br>
locate ” .”
<br>
 
<br>
Search for perl-scripts running

<br>
Code:

<br>
<br>
ps -aux | grep perl

<br>
<br>






</body>
</html> 




