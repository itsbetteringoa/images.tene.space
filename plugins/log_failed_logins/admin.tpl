<!-- Show the title of the plugin -->
<div class="titlePage">
 <h2>{'Log Failed Logins plugin'|@translate}</h2>
</div>
 
<!-- Show content in a nice box -->
<fieldset>
<legend>{'Log Failed Logins plugin'|@translate}</legend>
 
<div align=left>
<p>This plugin writes all failed login attempts into a text file, one line for one failed attempt. The format of the log looks like this:</p>

<pre>
2015/06/14 22:32:33 ip=192.168.1.100 username=Admin
</pre>

<p>The intended purpose of the logfile is to be used with <em>fail2ban</em>. Example configuration below assumes this plugin is configured to log into <em>/var/log/piwigoFailedLogins.log</em> and the user running your website (e.g. <em>www-data</em>) has read/write access to this file:</p>

<pre>
sudo touch /var/log/piwigoFailedLogins.log
sudo chown www-data:www-data /var/log/piwigoFailedLogins.log
</pre>

<p>In your <em>/etc/fail2ban/jail.local</em>:</p>

<pre>
[piwigo]
enabled = true
port = http,https
filter = piwigo
logpath = /var/log/piwigoFailedLogins.log
</pre>

<p>Create new filter <em>/etc/fail2ban/filter.d/piwigo.conf</em> with following content:</p>

<pre>
[INCLUDES]
before = common.conf
[Definition]
failregex = ip=&#60;HOST&#62;
ignoreregex =
</pre>
</div>

<form method="post" >
<fieldset id="mainConf">
<span class="property">
  <label for="log_filename">{'Log filename (including absolute path)'|@translate}</label><br><br>
</span>
<input type="text" name="log_filename" id="log_filename" value="{$LOG_FAILED_LOGINS_FILENAME}" size="100" maxlength="100">

<p>
  <input class="submit" type="submit" name="submitButton" value="{'Submit'|@translate}">
  <input class="submit" type="reset" name="resetButton" value="{'Reset'|@translate}">
</p>
</form>
</fieldset>

