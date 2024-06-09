@extends('layouts.main')

@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
       <div>
          <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
       </div>
       {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
          <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
             <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
             <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
          </div>
          <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="printer"></i>
          Print
          </button>
          <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="download-cloud"></i>
          Download Report
          </button>
       </div> --}}
    </div>
    <div class="row">
       <div class="col-12 col-xl-12 stretch-card">
          <div class="row flex-grow-1">
             <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                         <h6 class="card-title mb-0">Jumlah Materi</h6>
                         <div class="dropdown mb-2">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2">3</h3>
                            {{-- <div class="d-flex align-items-baseline">
                               <p class="text-success">
                                  <span>+3.3%</span>
                                  <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                               </p>
                            </div> --}}
                         </div>
                         <div class="col-6 col-md-12 col-xl-7">
                            <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             {{-- <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                         <h6 class="card-title mb-0">New Orders</h6>
                         <div class="dropdown mb-2">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2">35,084</h3>
                            <div class="d-flex align-items-baseline">
                               <p class="text-danger">
                                  <span>-2.8%</span>
                                  <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                               </p>
                            </div>
                         </div>
                         <div class="col-6 col-md-12 col-xl-7">
                            <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                         <h6 class="card-title mb-0">Growth</h6>
                         <div class="dropdown mb-2">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                               <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2">89.87%</h3>
                            <div class="d-flex align-items-baseline">
                               <p class="text-success">
                                  <span>+2.8%</span>
                                  <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                               </p>
                            </div>
                         </div>
                         <div class="col-6 col-md-12 col-xl-7">
                            <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                         </div>
                      </div>
                   </div>
                </div>
             </div> --}}
          </div>
       </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Grafik Nilai Siswa</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm me-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm me-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm me-2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download icon-sm me-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <p class="text-muted">Berikut ini merupakan grafik nilai siswa dalam mengerjakan soal.</p>
            <div id="chart"></div>
          </div> 
        </div>
      </div>
      {{-- <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Cloud storage</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm me-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm me-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm me-2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download icon-sm me-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div id="storageChart" style="min-height: 238.7px;"><div id="apexchartsx3g99ppm" class="apexcharts-canvas apexchartsx3g99ppm apexcharts-theme-light" style="width: 472px; height: 238.7px;"><svg id="SvgjsSvg1515" width="472" height="238.70000000000002" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1517" class="apexcharts-inner apexcharts-graphical" transform="translate(119, 0)"><defs id="SvgjsDefs1516"><clipPath id="gridRectMaskx3g99ppm"><rect id="SvgjsRect1519" width="242" height="260" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskx3g99ppm"></clipPath><clipPath id="nonForecastMaskx3g99ppm"></clipPath><clipPath id="gridRectMarkerMaskx3g99ppm"><rect id="SvgjsRect1520" width="240" height="262" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1521" class="apexcharts-radialbar"><g id="SvgjsG1522"><g id="SvgjsG1523" class="apexcharts-tracks"><g id="SvgjsG1524" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 118 30.93048780487804 A 87.06951219512196 87.06951219512196 0 1 1 117.98480350341804 30.93048913102254" fill="none" fill-opacity="1" stroke="rgba(233,236,239,1)" stroke-opacity="1" stroke-linecap="round" stroke-width="11.36829268292683" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 118 30.93048780487804 A 87.06951219512196 87.06951219512196 0 1 1 117.98480350341804 30.93048913102254"></path></g></g><g id="SvgjsG1526"><g id="SvgjsG1531" class="apexcharts-series apexcharts-radial-series" seriesName="StoragexUsed" rel="1" data:realIndex="0"><path id="SvgjsPath1532" d="M 118 30.93048780487804 A 87.06951219512196 87.06951219512196 0 1 1 41.84728874313238 160.2121371423509" fill="none" fill-opacity="1" stroke="rgba(101,113,255,1)" stroke-opacity="1" stroke-linecap="round" stroke-width="11.368292682926832" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="241" data:value="67" index="0" j="0" data:pathOrig="M 118 30.93048780487804 A 87.06951219512196 87.06951219512196 0 1 1 41.84728874313238 160.2121371423509"></path></g><circle id="SvgjsCircle1527" r="66.38536585365854" cx="118" cy="118" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1528" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1529" font-family="Helvetica, Arial, sans-serif" x="118" y="107" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="600" fill="#7987a1" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Storage Used</text><text id="SvgjsText1530" font-family="Helvetica, Arial, sans-serif" x="118" y="150" text-anchor="middle" dominant-baseline="auto" font-size="30px" font-weight="400" fill="#000000" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">67%</text></g></g></g></g><line id="SvgjsLine1533" x1="0" y1="0" x2="236" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1534" x1="0" y1="0" x2="236" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1518" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
            <div class="row mb-3">
              <div class="col-6 d-flex justify-content-end">
                <div>
                  <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                  <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                </div>
              </div>
              <div class="col-6">
                <div>
                  <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                  <h5 class="fw-bolder mb-0">~5TB</h5>
                </div>
              </div>
            </div>
            <div class="d-grid">
              <button class="btn btn-primary">Upgrade storage</button>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
    
    {{-- <div class="row">
       <div class="col-12 col-xl-12 grid-margin stretch-card">
          <div class="card overflow-hidden">
             <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                   <h6 class="card-title mb-0">Revenue</h6>
                   <div class="dropdown">
                      <button class="btn btn-link p-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                         <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                         <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                         <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                         <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                         <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                      </div>
                   </div>
                </div>
                <div class="row align-items-start mb-2">
                   <div class="col-md-7">
                      <p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business has from its normal business activities, usually from the sale of goods and services to customers.</p>
                   </div>
                   <div class="col-md-5 d-flex justify-content-md-end">
                      <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                         <button type="button" class="btn btn-outline-primary">Today</button>
                         <button type="button" class="btn btn-outline-primary d-none d-md-block">Week</button>
                         <button type="button" class="btn btn-primary">Month</button>
                         <button type="button" class="btn btn-outline-primary">Year</button>
                      </div>
                   </div>
                </div>
                <div id="revenueChart"></div>
             </div>
          </div>
       </div>
    </div> --}}
    
@endsection

@section('scripts')
<script>
   let tgl11 = '{{ Carbon\Carbon::now()->subDays(11)->format("d-m-y") }}'
   let tgl10 = '{{ Carbon\Carbon::now()->subDays(10)->format("d-m-y") }}'
   let tgl9 = '{{ Carbon\Carbon::now()->subDays(9)->format("d-m-y") }}'
   let tgl8 = '{{ Carbon\Carbon::now()->subDays(8)->format("d-m-y") }}'
   let tgl7 = '{{ Carbon\Carbon::now()->subDays(7)->format("d-m-y") }}'
   let tgl6 = '{{ Carbon\Carbon::now()->subDays(6)->format("d-m-y") }}'
   let tgl5 = '{{ Carbon\Carbon::now()->subDays(5)->format("d-m-y") }}'
   let tgl4 = '{{ Carbon\Carbon::now()->subDays(4)->format("d-m-y") }}'
   let tgl3 = '{{ Carbon\Carbon::now()->subDays(3)->format("d-m-y") }}'
   let tgl2 = '{{ Carbon\Carbon::now()->subDays(2)->format("d-m-y") }}'
   let tgl1 = '{{ Carbon\Carbon::now()->subDays(1)->format("d-m-y") }}'
   let tgl0 = '{{ Carbon\Carbon::now()->subDays(0)->format("d-m-y") }}'

   let tglparse11 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(11)) }}'
   let tglparse10 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(10)) }}'
   let tglparse9 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(9)) }}'
   let tglparse8 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(8)) }}'
   let tglparse7 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(7)) }}'
   let tglparse6 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(6)) }}'
   let tglparse5 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(5)) }}'
   let tglparse4 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(4)) }}'
   let tglparse3 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(3)) }}'
   let tglparse2 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(2)) }}'
   let tglparse1 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(1)) }}'
   let tglparse0 = '{{ App\Helpers\Format::getScore(Carbon\Carbon::now()->subDays(0)) }}'

   // console.log(tgl11)
   var options = {
          series: [{
          name: 'Inflation',
          data: [tglparse11, tglparse10, tglparse9, tglparse8, tglparse7, tglparse6, tglparse5, tglparse4, tglparse3, tglparse2, tglparse1, tglparse0]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + " / 100";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: [tgl11, tgl10, tgl9, tgl8, tgl7, tgl6, tgl5, tgl4, tgl3, tgl2, tgl1, tgl0],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "";
            }
          }
        
        },
        title: {
          text: ' Grafik Nilai Rata-Rata Test Soal Siswa',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
@endsection