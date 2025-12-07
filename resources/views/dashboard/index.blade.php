@include('dashboard.layout.head', ['title' => 'Dashboard Magang'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pengajuan Magang</li>
                </ol>
                <h1 class="page-title fw-medium fs-18 mb-0">Dashboard Pengajuan Magang</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="text-muted d-block mb-1">Total Pengajuan</span>
                                        <h4 class="fw-medium mb-0">{{ $totalPengajuan }}</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-primary">
                                            <i class="ti ti-briefcase fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Pengajuan Terdaftar</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="d-block text-muted mb-1">Disetujui</span>
                                        <h4 class="fw-medium mb-0">{{ $totalDisetujui }}</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-success">
                                            <i class="ti ti-check fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Pengajuan Disetujui</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="text-muted d-block mb-1">Ditolak</span>
                                        <h4 class="fw-medium mb-0">{{ $totalDitolak }}</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-danger">
                                            <i class="ti ti-x fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Pengajuan yang tidak disetujui.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="text-muted d-block mb-1">Menunggu Proses</span>
                                        <h4 class="fw-medium mb-0">{{ $totalMenunggu }}</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-warning">
                                            <i class="ti ti-clock fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Pengajuan yang masih dalam proses.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Distribusi Status Pengajuan
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-status"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Jenis Magang
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-jenis-magang"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Tren Pengajuan Per Bulan
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-pengajuan-bulan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Pengajuan Terbaru
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Mahasiswa</th>
                                        <th>Perusahaan</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($latestPengajuan as $item)
                                        <tr>
                                            <td>
                                                <div class="fw-medium">{{ $item->name }}</div>
                                                <div class="text-muted fs-11">{{ $item->nim }}</div>
                                            </td>
                                            <td>
                                                <div class="fw-medium">{{ $item->nama_perusahaan }}</div>
                                                <div class="text-muted fs-11">{{ $item->bagian_perusahaan }}</div>
                                            </td>
                                            <td>{{ $item->jenis_magang }}</td>
                                            <td>
                                                <span class="badge
                                                    @if($item->status === 'Disetujui') bg-success
                                                    @elseif($item->status === 'Ditolak') bg-danger
                                                    @else bg-warning @endif">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada pengajuan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End:: row-1 -->
    </div>
</div>

@include('dashboard.layout.footer')
<script src="{{ asset('dash') }}/build/assets/libs/apexcharts/apexcharts.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusLabels = @json(array_keys($statusCounts->toArray()));
    const statusSeries = @json(array_values($statusCounts->toArray()));

    const jenisLabels  = @json(array_keys($jenisMagangCounts->toArray()));
    const jenisSeries  = @json(array_values($jenisMagangCounts->toArray()));

    const bulanLabels  = @json($pengajuanPerBulan->pluck('bulan')->toArray());
    const bulanSeries  = @json($pengajuanPerBulan->pluck('total')->toArray());

    if (document.querySelector("#chart-status") && typeof ApexCharts !== 'undefined') {
        var optionsStatus = {
            series: statusSeries,
            chart: {
                type: 'donut',
                height: 260
            },
            labels: statusLabels,
            legend: { position: 'bottom' },
            noData: { text: 'Belum ada data' }
        };
        new ApexCharts(document.querySelector("#chart-status"), optionsStatus).render();
    }

    if (document.querySelector("#chart-jenis-magang") && typeof ApexCharts !== 'undefined') {
        var optionsJenis = {
            series: [{
                name: 'Pengajuan',
                data: jenisSeries
            }],
            chart: {
                type: 'bar',
                height: 260
            },
            xaxis: {
                categories: jenisLabels
            },
            noData: { text: 'Belum ada data' }
        };
        new ApexCharts(document.querySelector("#chart-jenis-magang"), optionsJenis).render();
    }

    if (document.querySelector("#chart-pengajuan-bulan") && typeof ApexCharts !== 'undefined') {
        var optionsBulan = {
            series: [{
                name: 'Pengajuan',
                data: bulanSeries
            }],
            chart: {
                type: 'area',
                height: 260
            },
            xaxis: {
                categories: bulanLabels
            },
            noData: { text: 'Belum ada data' }
        };
        new ApexCharts(document.querySelector("#chart-pengajuan-bulan"), optionsBulan).render();
    }
});
</script>
