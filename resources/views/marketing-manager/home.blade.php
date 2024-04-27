<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Dashboard using HTML, CSS, and JavaScript</title>
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('/css/style-dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div id="error-message" style="display: none;" data-error="{{ session('error') }}"></div>
<div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/icon-logo.webp" />
                <h2>Greenwich</h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="{{ route('mm.home') }}" class="active">
                <span class="material-icons">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="{{ route('mm.academicYear') }}">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Academic Year</h3>
            </a>
            <a href="{{ route('mm.profile') }}">
                <span class="material-symbols-outlined">stacks</span>
                <h3>Profile</h3>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">

                    <span class="material-icons">logout</span>
                    <h3>Log Out</h3>
                </a>
            </form>
        </div>
    </aside>
    <main>
        <h1>
            Dashboard
        </h1>
        @php
            $nameFaculty = [];
            $nameStudent = [];
            $numberStudent = [];
            $numberPercent = [];
            $numberContribution = [];
            $countContribution = 0;
            $countStudent = 0;
        @endphp
        <div class="list-chart" style="display: flex; flex-direction: column; width: 80%; height: 45rem; margin-left: 10%;">
            <div class="select-academic-year" style="width: 100%">
                <select name="academicYearSelect" class="academicYearSelect"  id="academicYearSelectBarChart">
                    @foreach($academicYears as $academicYear)
                        <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
                    @endforeach
                </select>

                @php
                    $nameFaculty = [];
                    $nameStudent = [];
                    $numberStudent = [];
                    $numberContribution = [];
                    $countContribution = 0;
                    $countStudent = 0;
                @endphp
                <table class="table-marketing-coordinator table" style="display: none;">
                    <thead class="table-marketing-coordinator-list-head-wrap table-list-head-wrap">
                    <tr class="table-marketing-coordinator-list-head table-list-head">
                        <th class="table-marketing-coordinator-head table-head">id</th>
                        @foreach ($faculties as $faculty)
                            <th class="table-marketing-coordinator-head table-head">number</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="table-marketing-coordinator-list-body-wrap table-list-body-wrap">
                    @foreach ($academicYears as $academicYear)
                        <tr class="table-marketing-coordinator-list-body table-list-body">
                            <td class="table-marketing-coordinator-body table-body">{{ $academicYear->id }}</td>

                            @foreach ($faculties as $faculty)
                                @foreach ($contributions as $contribution)
                                    @if ($contribution->faculty_id == $faculty->id)

                                        @if ($academicYear->id == $contribution->academicYear_id)
                                            @php
                                                $countContribution = $countContribution + 1;
                                            @endphp

                                        @endif
                                    @endif
                                @endforeach
                                <td class="table-marketing-coordinator-body table-body">{{ $countContribution }}</td>
                                @php
                                    $countContribution = 0;
                                @endphp
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            <canvas class="barChart" id="barChart" style="display: flex; padding: 0;"></canvas>
            <div class="select-academic-year" style="width: 100%;  margin-top: 5rem;">
                <select name="academicYearSelect" class="academicYearSelect"  id="academicYearSelectPieChart">
                    @foreach($academicYears as $academicYear)
                        <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
                    @endforeach
                </select>


                @php

                @endphp
                @foreach($faculties as $faculty)

                @endforeach

                @php
                    $nameFaculty = [];
                    $nameStudent = [];
                    $numberStudent = [];
                    $numberContribution = [];
                    $countContribution = 0;
                    $countStudent = 0;
                    $total = 0;
                @endphp
                <table class="table-pie-chart table" style="display: none;">
                    <thead class="table-pie-chart-list-head-wrap table-list-head-wrap">
                    <tr class="table-pie-chart-list-head table-list-head">
                        <th class="table-pie-chart-head table-head">id</th>
                        @foreach ($faculties as $faculty)
                            <th class="table-pie-chart-head table-head">number</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="table-pie-chart-list-body-wrap table-list-body-wrap">
                    @foreach ($academicYears as $academicYear)
                        <tr class="table-pie-chart-list-body table-list-body">
                            <td class="table-pie-chart-body table-body">{{ $academicYear->id }}</td>

                            @foreach ($faculties as $faculty)
                                @foreach($contributions as $contribution)
                                    @if ($academicYear->id == $contribution->academicYear_id)
                                        @php
                                            $total = $total + 1;
                                        @endphp
                                    @endif
                                @endforeach
                                @foreach ($contributions as $contribution)
                                        @if ($contribution->faculty_id == $faculty->id)
                                            @if ($academicYear->id == $contribution->academicYear_id)
                                                @php
                                                    $countContribution = $countContribution + 1;
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($total != 0)
                                        @php
                                            $percent = ($countContribution / $total) * 100;
                                        @endphp
                                        <td class="table-pie-chart-body table-body">{{ $percent }}</td>
                                    @else
                                        <td class="table-pie-chart-body table-body">0</td>
                                    @endif
                                @php
                                    $countContribution = 0;
                                    $total = 0;
                                    $percent = 0;
                                @endphp
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            <canvas class="pieChart" id="pieChart" style="display: flex; padding: 0;"></canvas>
{{--            <div class="select-academic-year" style="width: 100%;  margin-top: 5rem;">--}}
{{--                <select name="academicYearSelect" class="academicYearSelect"  id="academicYearSelectLineChart">--}}
{{--                    @foreach($academicYears as $academicYear)--}}
{{--                        <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

{{--                @php--}}
{{--                    $nameFaculty = [];--}}
{{--                    $nameStudent = [];--}}
{{--                    $numberStudent = [];--}}
{{--                    $numberContribution = [];--}}
{{--                    $countContribution = 0;--}}
{{--                    $countStudent = 0;--}}
{{--                @endphp--}}
{{--                <table class="table-line-chart table" style="display: none;">--}}
{{--                    <thead class="table-line-chart-list-head-wrap table-list-head-wrap">--}}
{{--                    <tr class="table-line-chart-list-head table-list-head">--}}
{{--                        <th class="table-line-chart-head table-head">id</th>--}}
{{--                        @foreach ($faculties as $faculty)--}}
{{--                            <th class="table-line-chart-head table-head">number</th>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody class="table-line-chart-list-body-wrap table-list-body-wrap">--}}
{{--                    @foreach ($academicYears as $academicYear)--}}
{{--                        <tr class="table-line-chart-list-body table-list-body">--}}
{{--                            <td class="table-line-chart-body table-body">{{ $academicYear->id }}</td>--}}

{{--                            @foreach ($faculties as $faculty)--}}
{{--                                @foreach($contributions as $contribution)--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        @if($contribution->user_id == $user->id && $user->faculty_id == $contribution->faculty_id && !isset($nameStudent[$user->name]))--}}
{{--                                            @php--}}
{{--                                                $nameStudent[] = $user->name;--}}
{{--                                                $countStudent = $countStudent + 1;--}}
{{--                                            @endphp--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                    @php--}}
{{--                                        $numberStudent[] = $countStudent;--}}
{{--                                        $countStudent = 0;--}}
{{--                                    @endphp--}}
{{--                                @endforeach--}}
{{--                            @endforeach--}}
{{--                            @foreach ($numberStudent as $studentCount)--}}
{{--                                <td class="table-line-chart-body table-body">{{ $studentCount }}</td>--}}
{{--                            @endforeach--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}


{{--            </div>--}}
{{--            <canvas class="lineChart" id="lineChart" style="display: flex; padding: 0;"></canvas>--}}
        </div>
    </main>


</div>
<script src="{{ asset('/js/chart.js') }}"></script>
<script src="{{ asset('/js/index.js') }}"></script>
<script src="{{ asset('/js/error.js') }}"></script>

@foreach ($faculties as $faculty)
    @php
        $nameFaculty[] = $faculty->faculty;
    @endphp
    @foreach($contributions as $contribution)
            @if ($academicYear_id == $contribution->academicYear_id)
            @php
                $total = $total + 1;
            @endphp
            @endif
    @endforeach
    @foreach($contributions as $contribution)
        @foreach($users as $user)
            @if($contribution->user_id == $user->id && $user->faculty_id == $contribution->faculty_id && !isset($nameStudent[$user->name]))
                @php
                    $nameStudent[] = $user->name;
                    $countStudent = $countStudent + 1;
                @endphp
            @endif
        @endforeach
        @php
            $numberStudent[] = $countStudent;
            $countStudent = 0;
        @endphp
    @endforeach

    @foreach ($contributions as $contribution)
        @if ($contribution->faculty_id == $faculty->id)
            @if ($academicYear_id == $contribution->academicYear_id)
                @php
                    $countContribution = $countContribution + 1;
                @endphp
            @endif
        @endif
    @endforeach
    @php
            $percent = ($countContribution / $total) * 100;
            $numberPercent[] = $percent;
            $total = 0;
            $percent = 0;
            $numberContribution[] = $countContribution;
            $countContribution = 0;
    @endphp
@endforeach
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectID = document.getElementById("academicYearSelectBarChart");
        const tableRows = document.querySelectorAll(".table-list-body");

        selectID.addEventListener("change", function() {
            const selectedValue = selectID.value.toLowerCase();

            const rows = document.querySelectorAll('.table-marketing-coordinator-list-body');

            rows.forEach(function(row) {
                const idCell = row.querySelector('.table-marketing-coordinator-body');
                const id = idCell.textContent.trim().toLowerCase();

                if (id === selectedValue) {
                    row.style.display = "table-row";
                    updateBarChart();
                } else {
                    row.style.display = "none";
                }
            });
        });
        function updateBarChart() {
            const selectedRows = document.querySelectorAll('.table-marketing-coordinator-list-body[style="display: table-row;"]');
            const numberContributions = [];

            selectedRows.forEach(function(row) {
                const numberCells = row.querySelectorAll('.table-marketing-coordinator-body:nth-child(n+2)');

                numberCells.forEach(function(cell) {
                    const contribution = parseInt(cell.textContent.trim());
                    numberContributions.push(contribution);
                });
            });

            barChartData.datasets[0].data = numberContributions;

            if (barChart) {
                barChart.update();
            } else {
                barChart = new Chart(
                    document.getElementById('barChart'),
                    barChartConfig
                );
            }
        }

        contributeBarChartButton.addEventListener("click", updateBarChart);
    });
</script>

<script>
    const labels = <?php echo json_encode($nameFaculty) ?>;
    const barChartData = {
        labels: labels,
        datasets: [{
            label: 'Bar Chart Dataset',
            data: <?php echo json_encode($numberContribution) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    const barChartConfig = {
        type: 'bar',
        data: barChartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            maintainAspectRatio: false,
            responsive: true,
            width: 400,
            height: 400
        },
    };

    var barChart = new Chart(
        document.getElementById('barChart'),
        barChartConfig
    );
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectID = document.getElementById("academicYearSelectPieChart");
        const tableRows = document.querySelectorAll(".table-list-body");

        selectID.addEventListener("change", function() {
            const selectedValue = selectID.value.toLowerCase();

            const rows = document.querySelectorAll('.table-pie-chart-list-body');

            rows.forEach(function(row) {
                const idCell = row.querySelector('.table-pie-chart-body');
                const id = idCell.textContent.trim().toLowerCase();

                if (id === selectedValue) {
                    row.style.display = "table-row";
                    updatePieChart();
                } else {
                    row.style.display = "none";
                }
            });
        });
        function updatePieChart() {
            const selectedRows = document.querySelectorAll('.table-pie-chart-list-body[style="display: table-row;"]');
            const numberContributions = [];

            selectedRows.forEach(function(row) {
                const numberCells = row.querySelectorAll('.table-pie-chart-body:nth-child(n+2)');

                numberCells.forEach(function(cell) {
                    const contribution = parseInt(cell.textContent.trim());
                    numberContributions.push(contribution);
                });
            });

            pieChartData.datasets[0].data = numberContributions;

            if (pieChart) {
                pieChart.update();
            } else {
                pieChart = new Chart(
                    document.getElementById('pieChart'),
                    pieChartConfig
                );
            }
        }

    });
</script>

<script>
    const pieChartData = {
        labels: <?php echo json_encode($nameFaculty) ?>,
        datasets: [{
            label: 'Pie Chart Dataset',
            data: <?php echo json_encode($numberPercent) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderWidth: 1
        }]
    };
    const pieChartConfig = {
        type: 'pie',
        data: pieChartData,
        options: {
            maintainAspectRatio: false,
            responsive: true,
            width: 400,
            height: 400
        }
    };

    var pieChart = new Chart(
        document.getElementById('pieChart'),
        pieChartConfig
    );
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectID = document.getElementById("academicYearSelectLineChart");
        const tableRows = document.querySelectorAll(".table-list-body");

        selectID.addEventListener("change", function() {
            const selectedValue = selectID.value.toLowerCase();

            const rows = document.querySelectorAll('.table-line-chart-list-body');

            rows.forEach(function(row) {
                const idCell = row.querySelector('.table-line-chart-body');
                const id = idCell.textContent.trim().toLowerCase();

                if (id === selectedValue) {
                    row.style.display = "table-row";
                    updateLineChart();
                } else {
                    row.style.display = "none";
                }
            });
        });
        function updateLineChart() {
            const selectedRows = document.querySelectorAll('.table-line-chart-list-body[style="display: table-row;"]');
            const numberContributions = [];

            selectedRows.forEach(function(row) {
                const numberCells = row.querySelectorAll('.table-line-chart-body:nth-child(n+2)');

                numberCells.forEach(function(cell) {
                    const contribution = parseInt(cell.textContent.trim());
                    numberContributions.push(contribution);
                });
            });

            lineChartData.datasets[0].data = numberContributions;

            if (lineChart) {
                lineChart.update();
            } else {
                lineChart = new Chart(
                    document.getElementById('lineChart'),
                    lineChartConfig
                );
            }
        }
    });
</script>

<script>
    const lineChartData = {
        labels: <?php echo json_encode($nameFaculty) ?>,
        datasets: [{
            label: 'Line Chart Dataset',
            data: <?php echo json_encode($numberStudent) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const lineChartConfig = {
        type: 'line',
        data: lineChartData,
        options: {
            maintainAspectRatio: false,
            responsive: true,
            width: 400,
            height: 400
        }
    };

    var lineChart = new Chart(
        document.getElementById('lineChart'),
        lineChartConfig
    );
</script>
</body>
</html>
