<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);

// Check if context is cities
$context = filter_input(INPUT_GET, 'context', FILTER_SANITIZE_STRING);
if ($context === 'cities') {
    
} else {
    $countrysearch = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $countryresult = $countrysearch->fetchAll(PDO::FETCH_ASSOC);

    // Display the search results
    ?>
    <table id="TableWithCountries">
        <tr>
            <th><?= 'Name'; ?></th>
            <th><?= 'Continent'; ?></th>
            <th><?= 'Independence'; ?></th>
            <th><?= 'Head of State'; ?></th>
        </tr>

        <?php foreach ($countryresult as $row): ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['continent']; ?></td>
                <td><?= $row['independence_year']; ?></td>
                <td><?= $row['head_of_state']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
}
?>
