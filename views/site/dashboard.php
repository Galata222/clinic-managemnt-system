<?php

use yii\helpers\Html;
use sjaakp\cycle\Cycle;
use app\models\Users;
use app\models\Departments;
use app\models\Roles;
use app\models\CentralTriage;
$this->registerCssFile('@web/css/styles.css');
$this->registerCssFile('@web/css/slideshow.css');

use dosamigos\chartjs\ChartJs;
$this->title = 'The clinic Dashboard';

?>
<div class="site-index ">

    <div>
        <h2>Clinic Data</h2>

        <p>
            The provided bar chart that visually represents and compares the counts of various entities
            within an Clinic's dataset. This chart provides valuable insights into the composition and
            distribution of these entities, helping viewers understand the relative proportions and quantities.</p>

    </div>
    <?php


// Fetch counts from respective models
$countUser = Users::find()->count();
$countDepartments = Departments::find()->count();
$countPhysicians = Roles::find()->count();
$countPatients = CentralTriage::find()->count();

// Define data for the chart
$chartData = [
    'labels' => ["Users", "Departments", "Physicians", "Patients"],
    'datasets' => [
        [
            'label' => "Count",
            'backgroundColor' => ["rgba(255, 99, 132, 0.5)", "rgba(54, 162, 235, 0.5)", "rgba(255, 206, 86, 0.5)", "rgba(75, 192, 192, 0.5)"],
            'borderColor' => ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)", "rgba(75, 192, 192, 1)"],
            'borderWidth' => 1, // Adjust border width as needed
            'pointBackgroundColor' => "#fff",
            'pointBorderColor' => "#fff",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(255, 99, 132, 1)",
            'data' => [$countUser, $countDepartments, $countPhysicians, $countPatients],
        ],
    ],
];

?>

    <?= ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'height' => 200,
        'width' => 400,
    ],
    'data' => $chartData,
]);
?>

    <!-- Pie chart -->
    <div>
        <h2>Physician Data in the Clinic</h2>

        <p>The data displayed by pie chart visually represents the distribution of users
            across various roles within the clinic. This pie chart provides insightful information about the
            composition of the user roles and their respective proportions relative to the total number of users.</p>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <?php


$roleCounts = [];
$roleLabels = [];
$colors = [
    'rgba(255, 99, 132, 0.7)',
    'rgba(54, 162, 235, 0.7)',
    'rgba(255, 206, 86, 0.7)',
    'rgba(75, 192, 192, 0.7)',
    'rgba(153, 102, 255, 0.7)',
    'rgba(255, 159, 64, 0.7)',
];

$roles = ['nurse', 'doctor', 'recept', 'pharmacist', 'lab_tech', 'accountant'];

foreach ($roles as $role) {
    $count = Users::find()->where(['role' => $role])->count();
    $percentage = ($count / $countUser) * 100;
    $roleCounts[] = $percentage;
    $roleLabels[] = ucfirst($role); // Display role with the first letter capitalized
}

$data = [
    'labels' => $roleLabels,
    'datasets' => [
        [
            'data' => $roleCounts,
            'backgroundColor' => $colors,
        ],
    ],
];

$this->registerJs("
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var data = " . json_encode($data) . ";
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
");
?>

    <canvas id="myPieChart"></canvas>




</div>