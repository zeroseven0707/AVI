@extends('layouts.app-admin')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{ auth()->user()->name }}</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
    <div class="row">
        <!-- Weather and People Section -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="images/dashboard/people.svg" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal">
                                    <i class="icon-sun mr-2"></i>{{ $temperature }}<sup>C</sup>
                                </h2>
                                <p>{{ ucfirst($weatherCondition) }}</p>
                            </div>
                            <div class="ml-2">
                                <h4 class="location font-weight-normal">Jakarta</h4>
                                <h6 class="font-weight-normal">Indonesia</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <!-- Today's Donations -->
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Today’s Donations</p>
                            <p class="fs-30 mb-2">{{ number_format($todaysDonations) }}</p>
                            {{-- <p>10.00% (30 days)</p> --}}
                        </div>
                    </div>
                </div>

                <!-- Total Donations -->
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Donations</p>
                            <p class="fs-30 mb-2">{{ number_format($totalDonations) }}</p>
                            {{-- <p>22.00% (30 days)</p> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Active Campaigns -->
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Active Program</p>
                            <p class="fs-30 mb-2">{{ $activeCampaigns }}</p>
                            {{-- <p>2.00% (30 days)</p> --}}
                        </div>
                    </div>
                </div>

                <!-- Total Campaigns -->
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total Program</p>
                            <p class="fs-30 mb-2">{{ $totalCampaigns }}</p>
                            {{-- <p>0.22% (30 days)</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
    
            <!-- Transaction Details Section -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Transaction Details</p>
                        <div class="d-flex flex-wrap mb-5">
                            <div class="mr-5 mt-3">
                                <p class="text-muted">Users</p>
                                <h3 class="text-primary fs-30 font-weight-medium">{{ $users }}</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted">Categories</p>
                                <h3 class="text-primary fs-30 font-weight-medium">{{ number_format($categories) }}</h3>
                            </div> 
                        </div>
                        <canvas id="transaction-chart"></canvas>
                    </div>
                </div>
            </div>
          {{-- todo --}}
          @livewire('todo-list')
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <p class="card-title mb-0">Donations</p>
                <div class="table-responsive">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Midtrans Order Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $campaign)
                            <tr>
                                <td>{{ $campaign->midtrans_order_id }}</td>
                                <td>{{ $campaign->name }}</td>
                                <td>{{ $campaign->email }}</td>
                                <td>{{ $campaign->no_telp }}</td>
                                <td>{{ $campaign->donation_date }}</td>
                                <td>{{ number_format($campaign->amount) }}</td>
                                <td>
                                    @if ($campaign->status == 'pending')
                                        <div class="badge badge-warning">Pending</div>
                                    @elseif($campaign->status == 'success')
                                        <div class="badge badge-success">Success</div>
                                    @else
                                        <div class="badge badge-danger">Failed</div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Transaction Chart
        var ctx = document.getElementById('transaction-chart').getContext('2d');
        var transactionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Users', 'Categories'],
                datasets: [{
                    label: 'Details',
                    data: [{{ $users }}, {{ $categories }}],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                    borderColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
   @endsection
