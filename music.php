<!doctype html>
<html itemscope itemtype="http://schema.org/Product" lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <title>Test Page</title>
</head>
<body>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbtest";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "select ar.artist_name, al.album_name, al.album_year, s.song_name, s.track_number
				from artist ar 
				inner join album al on ar.artist_id = al.artist_id
				inner join song s on al.album_id = s.album_id;
		";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<table width=800>";
			echo "<tr>";
			echo "<th>Artist</th>";
			echo "<th>Album</th>";
			echo "<th>Year</th>";
			echo "<th>Song</th>";
			echo "<th>Track#</th>";
			echo "</tr>";

			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["artist_name"]. "</td>";
				echo "<td>" . $row["album_name"]. "</td>";
				echo "<td>" . $row["album_year"]. "</td>";
				echo "<td>" . $row["song_name"]. "</td>";
				echo "<td>" . $row["track_number"]. "</td>";
				echo "</tr>";
			}
			echo "</table>";

		} else {
			echo "0 results";
		}
		$conn->close();
		?>

</body>
</html>
