<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
                <img
                    src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/icon-logo.webp"/>
                <h2>Greenwich</h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="{{ route('admin.home') }}" class="active">
                <span class="material-icons">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="{{ route('admin.student') }}">
                <span class="material-symbols-outlined">group</span>
                <h3>Student</h3>
            </a>
            <a href="{{ route('admin.guest') }}">
                <span class="material-symbols-outlined">manage_accounts</span>
                <h3>Guest</h3>
            </a>
            <a href="{{ route('admin.mc') }}">
                <span class="material-symbols-outlined">groups</span>
                <h3>Marketing Coordinator</h3>
            </a>
            <a href="{{ route('admin.academic') }}">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Academic year</h3>
            </a>
            <a href="{{ route('admin.faculty') }}">
                <span class="material-symbols-outlined">subject</span>
                <h3>Faculty</h3>
            </a>
            <a href="{{ route('admin.profile') }}">
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
        <div class="select-academic-year">
            <select name="academicYearSelect"  class="academicYearSelect"  id="academicYearSelect">
                @foreach($academicYears as $academicYear)
                    <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
                @endforeach
            </select>

            @php
                $nameFaculty = [];
                $numberContribution = [];
                $count = 0;
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
                                                $count = $count + 1;
                                            @endphp

                                        @endif
                                    @endif
                                @endforeach
                        <td class="table-marketing-coordinator-body table-body">{{ $count }}</td>
                                    @php
                                        $count = 0;
                                    @endphp
                            @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <div class="list-chart" style="display: inline-flex; width: 80%; height: 45rem; margin-left: 10%;">
            <canvas class="barChart" id="barChart" style="display: inline-block; padding: 0;"></canvas>
            {{--            <canvas class="pieChart" id="pieChart" style="display: inline-block; padding: 0;"></canvas>--}}
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
    @foreach ($contributions as $contribution)
        @if ($contribution->faculty_id == $faculty->id)

            @if ($academicYear_id == $contribution->academicYear_id)
                @php
                    $count = $count + 1;
                @endphp

            @endif
        @endif

    @endforeach
    @php
        $numberContribution[] = $count;
        $count = 0;
    @endphp
@endforeach
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectID = document.getElementById("academicYearSelect");
        const tableRows = document.querySelectorAll(".table-list-body");

        selectID.addEventListener("change", function() {
            const selectedValue = selectID.value.toLowerCase();

            const rows = document.querySelectorAll('.table-marketing-coordinator-list-body');

            rows.forEach(function(row) {
                const idCell = row.querySelector('.table-marketing-coordinator-body');
                const id = idCell.textContent.trim().toLowerCase();

                if (id === selectedValue) {
                    row.style.display = "table-row";
                    updateChart();
                } else {
                    row.style.display = "none";
                }
            });
        });
        function updateChart() {
            const selectedRows = document.querySelectorAll('.table-marketing-coordinator-list-body[style="display: table-row;"]');
            const numberContributions = [];

            selectedRows.forEach(function(row) {
                const numberCells = row.querySelectorAll('.table-marketing-coordinator-body:nth-child(n+2)'); // Bỏ qua cột đầu tiên (id)

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

        contributeButton.addEventListener("click", updateChart);
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
    const pieChartData = {
        labels: <?php echo json_encode($nameFaculty) ?>,
        datasets: [{
            label: 'Pie Chart Dataset',
            data: <?php echo json_encode($numberContribution) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 205, 86, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
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
</body>
</html>
