@extends('layouts.admin')

@section('title','Laporan')

@section('content')

<div class="admin-reports">

    <div class="page-header">

        <h1>
            <i class="bi bi-graph-up-arrow"></i>
            Laporan Sistem
        </h1>

    </div>

    {{-- STATISTIC CARDS --}}

    <div class="report-stats-grid">

        <div class="report-stat-card green">

            <div class="stat-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div>
                <h2>{{ $totalDonations ?? 124 }}</h2>
                <p>Total Donasi</p>
            </div>

        </div>

        <div class="report-stat-card blue">

            <div class="stat-icon">
                <i class="bi bi-people"></i>
            </div>

            <div>
                <h2>{{ $totalUsers ?? 13 }}</h2>
                <p>Total User</p>
            </div>

        </div>

        <div class="report-stat-card orange">

            <div class="stat-icon">
                <i class="bi bi-heart"></i>
            </div>

            <div>
                <h2>{{ $totalRequests ?? 87 }}</h2>
                <p>Total Pengajuan</p>
            </div>

        </div>

        <div class="report-stat-card purple">

            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>

            <div>
                <h2>{{ $completedRequests ?? 42 }}</h2>
                <p>Bantuan Selesai</p>
            </div>

        </div>

    </div>

    {{-- CHARTS --}}

    <div class="report-chart-grid">

        <div class="report-card">

            <h3>Total Donasi per Bulan</h3>

            <div class="chart-container">
                <canvas id="donationChart"></canvas>
            </div>

        </div>

        <div class="report-card">

            <h3>Komposisi User</h3>

            <div class="chart-container">
                <canvas id="userChart"></canvas>
            </div>

        </div>

    </div>

    <div class="report-chart-grid">

        <div class="report-card">

            <h3>Status Pengajuan</h3>

            <div class="chart-container">
                <canvas id="requestChart"></canvas>
            </div>

        </div>

        <div class="report-card">

            <h3>Ringkasan Sistem</h3>

            <div class="summary-list">

                <div class="summary-item">
                    <span>Total Donasi</span>
                    <strong>{{ $totalDonations ?? 124 }}</strong>
                </div>

                <div class="summary-item">
                    <span>Total User</span>
                    <strong>{{ $totalUsers ?? 13 }}</strong>
                </div>

                <div class="summary-item">
                    <span>Total Pengajuan</span>
                    <strong>{{ $totalRequests ?? 87 }}</strong>
                </div>

                <div class="summary-item">
                    <span>Bantuan Selesai</span>
                    <strong>{{ $completedRequests ?? 42 }}</strong>
                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('donationChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun'
        ],

        datasets: [{

            label: 'Total Donasi',

            data: [
                500,
                950,
                1200,
                800,
                1000,
                1200
            ],

            backgroundColor: '#159A38',

            borderRadius: 4

        }]

    },

    options: {

        responsive:true,

        plugins:{
            legend:{
                display:false
            }
        },

        scales:{

            y:{
                beginAtZero:true
            }

        }

    }

});

new Chart(
document.getElementById('userChart'),
{
    type:'doughnut',

    data:{
        labels:['Admin','Donatur','Penerima'],
        datasets:[{
            data:[2,5,6],
            backgroundColor:[
                '#159A38',
                '#F59E0B',
                '#3B82F6'
            ]
        }]
    }
});

new Chart(
document.getElementById('requestChart'),
{
    type:'doughnut',

    data:{
        labels:[
            'Pending',
            'Approved',
            'Completed',
            'Rejected'
        ],

        datasets:[{
            data:[12,20,42,5],
            backgroundColor:[
                '#FACC15',
                '#3B82F6',
                '#159A38',
                '#EF4444'
            ]
        }]
    }
});

</script>

@endsection