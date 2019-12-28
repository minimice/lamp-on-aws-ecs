<html>
<head><title>Moocaholic</title></head>
<body>

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

<p>
<?php
$host = 'rds-aurora-mysql-databasecluster-17x8veja4c9jm.cluster-fake1234.us-east-1.rds.amazonaws.com';
$user = 'yoda';
$pass = 'fakepwd';

try {
  $conn = new mysqli($host, $user, $pass);
  if ($conn->connect_error) {
    echo "Connection to Aurora MySQL cluster did not succeed.";
  } else {
    echo "Connected to Aurora MySQL cluster succeeded!";
  }
} catch (Exception $e) {
    echo 'Unable to connect, ensure the database is accessible';
}
?>
</p>

<p>Demo created by <a href="https://github.com/minimice">Lim, Chooi Guan</a></p>

</body>
</html>
