<h1>Hello Moocaholic!</h1>

<h3>
<?php
$hostname = getenv('HOSTNAME');
echo "Container hostname is: $hostname"; 
?>
</h3>
<p>
Refresh the page to switch to another container instance
</p>

<p>
<img src="https://cdn.moocaholic.com/images/yoda.jpg" title="Served from Cloudfront CDN" />
</p>

<h3>
Learn or learn not, there is no try ~ Baby yoda
</h3>

<p>Demo created by <a href="https://github.com/minimice">Lim, Chooi Guan</a></p>

<!--
<h4>Attempting MySQL connection from php...</h4>
<h3>
<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL successfully!";
}
?>
</h3>
-->

