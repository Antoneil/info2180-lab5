<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, 'context', FILTER_SANITIZE_STRING);

if ($context === 'cities') {
    $citySearch = $conn->query("SELECT cities.name AS city_name, cities.district, cities.population FROM cities 
                               JOIN countries ON cities.country_code = countries.code
                               WHERE countries.name LIKE '%$country%'");
    $cityResult = $citySearch->fetchAll(PDO::FETCH_ASSOC);

    // Display the search results for cities
    ?>
    <table id="TableWithCities">
        <tr>
            <th><?= 'Name'; ?></th>
            <th><?= 'District'; ?></th>
            <th><?= 'Population'; ?></th>
        </tr>

        <?php foreach ($cityResult as $row): ?>
            <tr>
                <td><?= $row['city_name']; ?></td>
                <td><?= $row['district']; ?></td>
                <td><?= $row['population']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
} else {
    $countrySearch = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $countryResult = $countrySearch->fetchAll(PDO::FETCH_ASSOC);

    // Display the search results for countries
    ?>
    <table id="TableWithCountries">
        <tr>
            <th><?= 'Name'; ?></th>
            <th><?= 'Continent'; ?></th>
            <th><?= 'Independence'; ?></th>
            <th><?= 'Head of State'; ?></th>
        </tr>

        <?php foreach ($countryResult as $row): ?>
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
