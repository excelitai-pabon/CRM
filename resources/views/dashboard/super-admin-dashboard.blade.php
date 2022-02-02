
@extends('master.master')





@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Dashboard</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to Shapla City Super Admin Dashboard</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="fas fa-users" style="width:380; height:380;"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Users</h5>
                        <h4 class="fw-medium font-size-24">{{$users}} </h4>
                        <div class="mini-stat-label bg-success">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{asset('assets')}}/images/services-icon/02.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Total Due</h5>
                        <h4 class="fw-medium font-size-24">{{$totalDueAmount}} </h4>
                        <div class="mini-stat-label bg-danger">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{asset('assets')}}/images/services-icon/03.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Total Paid</h5>
                        <h4 class="fw-medium font-size-24">{{$totalPaidAmount}} </h4>
                        <div class="mini-stat-label bg-info">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{asset('assets')}}/images/services-icon/04.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Today Total Due</h5>
                        <h4 class="fw-medium font-size-24">{{$todayTotalDue}} </h4>
                        <div class="mini-stat-label bg-warning">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="{{asset('assets')}}/images/services-icon/04.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Today Total Due</h5>
                    <h4 class="fw-medium font-size-24">{{$till_today_due}} </h4>
                    <div class="mini-stat-label bg-warning">
                    </div>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>









    <div class="row">

        <div class="col-lg-6">
            <div id="main5" style="width:600px;height:400px;"></div>
        </div>

        <div class="col-lg-6">
            <div id="main4" style="width:600px;height:400px;"></div>
        </div>

    </div>
    <div class="row">

        <div class="col-lg-6">
            <div id="main3" style="width:600px;height:400px;"></div>
        </div>

        <div class="col-lg-6">
            <div id="main6" style="width:600px;height:400px;"></div>
        </div>


    </div>
    <div class="row">
        <div class="col-lg-6">
            <div id="main2" style="width:600px;height:400px;"></div>
        </div>

        <div class="col-lg-6">
            <div id="main" style="width:600px;height:400px;"></div>
        </div>


    </div>




    </div>
    <!-- end row -->





</div> <!-- container-fluid -->
@endsection

@section('script')


<script type="text/javascript">
    // Initialize the echarts instance based on the prepared dom
    var myChart = echarts.init(document.getElementById('main'));
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    console.log(cData);

    // Specify the configuration items and data for the chart
    var option = {
        title: [
    {
      text: 'daily due'
    }

  ],
        color:{
        0: "#FF0000",
        1: "#91cc75",
        2: "#fac858",
        3: "#ee6666",
        4: "#73c0de",
        5: "#3ba272",
        6: "#fc8452",
        7: "#9a60b4",
        8: "#ea7ccc",
    },

      tooltip: {},
      legend: {
        data: ['sales']
      },
      xAxis: {
        data: ['booking', 'building', 'downPay', 'floor', 'land1', 'land2','finishing']
      },
      yAxis: {},
      series: [
        {
          name: 'sales',
          type: 'bar',
          data: [cData.booking_status_daily,cData.building_pilling_daily,cData.down_payment_daily, cData.first_floor_daily,cData.land_filling_1st_daily,cData.land_filling_2nd_daily,cData.finishing_money_daily]
        }
      ]
    };

    // Display the chart using the configuration items and data just specified.
    myChart.setOption(option);
  </script>



<script type="text/javascript">
    // Initialize the echarts instance based on the prepared dom
    var myChart = echarts.init(document.getElementById('main3'));
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    console.log(cData);

    // Specify the configuration items and data for the chart
    var option = {
        title: [
    {
      text: 'yearly due'
    }
  ],

      tooltip: {},
      legend: {
        data: ['sales']
      },
      xAxis: {
        data: ['booking', 'pilling', 'downPay', 'floor', 'land1', 'land2','finishing']
      },
      color:{
        1: "#91cc75",
        2: "#fac858",
        3: "#ee6666",
        4: "#73c0de",
        5: "#3ba272",
        6: "#fc8452",
        7: "#9a60b4",
        8: "#ea7ccc",
      },
      yAxis: {},
      series: [
        {
          name: 'sales',
          type: 'bar',
          data: [cData.booking_status_yearly, cData.building_pilling_yearly, cData.down_payment_yearly, cData.first_floor_yearly,cData.land_filling_1st_yearly,cData.land_filling_2nd_yearly,cData.finishing_money_yearly]
        }
      ]
    };

    // Display the chart using the configuration items and data just specified.
    myChart.setOption(option);
  </script>




<script>

var chartDom = document.getElementById('main2');
var myChart = echarts.init(chartDom);
var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
var option;

option = {
  tooltip: {
    trigger: 'item'
  },
  legend: {
    top: '5%',
    left: 'center'
  },
  series: [
    {
      name: 'Access From',
      type: 'pie',
      radius: ['40%', '70%'],
      avoidLabelOverlap: false,
      itemStyle: {
        borderRadius: 10,
        borderColor: '#fff',
        borderWidth: 2
      },
      label: {
        show: false,
        position: 'center'
      },
      emphasis: {
        label: {
          show: true,
          fontSize: '40',
          fontWeight: 'bold'
        }
      },
      labelLine: {
        show: false
      },
      data: [
        { value: cData.paid_data, name: 'PAID' },
        { value: cData.due_data, name: 'DUE' },
      ]
    }
  ]
};

option && myChart.setOption(option);
</script>


<script>

    var chartDom = document.getElementById('main5');
    var myChart = echarts.init(chartDom);
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    var option;

    option = {
      tooltip: {
        trigger: 'item'
      },
      legend: {
        top: '5%',
        left: 'center'
      },
      series: [
        {
          name: 'Access From',
          type: 'pie',
          radius: ['40%', '70%'],
          avoidLabelOverlap: false,
          itemStyle: {
            borderRadius: 10,
            borderColor: '#fff',
            borderWidth: 2
          },
          label: {
            show: false,
            position: 'center'
          },
          emphasis: {
            label: {
              show: true,
              fontSize: '40',
              fontWeight: 'bold'
            }
          },
          labelLine: {
            show: false
          },
          data: [
            { value: cData.monthlyTotalDue, name: 'Monthly Due' },
            { value: cData.monthlyTotalPaid, name: 'Monthly Paid' },
          ]
        }
      ]
    };

    option && myChart.setOption(option);
    </script>



<script>

    var chartDom = document.getElementById('main6');
    var myChart = echarts.init(chartDom);
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    var option;

    option = {
      tooltip: {
        trigger: 'item'
      },
      legend: {
        top: '5%',
        left: 'center'
      },
      series: [
        {
          name: 'Access From',
          type: 'pie',
          radius: ['40%', '70%'],
          avoidLabelOverlap: false,
          itemStyle: {
            borderRadius: 10,
            borderColor: '#fff',
            borderWidth: 2
          },
          label: {
            show: false,
            position: 'center'
          },
          emphasis: {
            label: {
              show: true,
              fontSize: '40',
              fontWeight: 'bold'
            }
          },
          labelLine: {
            show: false
          },
          data: [
            { value: cData.yearlyTotalDue, name: 'Yearly Due' },
            { value: cData.yearlyTotalPaid, name: 'Yearly Paid' },
          ]
        }
      ]
    };

    option && myChart.setOption(option);
    </script>






<script>
     // Initialize the echarts instance based on the prepared dom
     var myChart = echarts.init(document.getElementById('main4'));
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    console.log(cData);

    // Specify the configuration items and data for the chart
    var option = {
        title: [
    {
      text: 'Monthly due',
      color:"red",
      borderColor: "red"
    }
  ],
      tooltip: {},
      legend: {
        data: ['sales']
      },
      xAxis: {
        data: ['booking', 'pilling', 'downPay', 'floor', 'land1', 'land2','finishing']
      },
      yAxis: {},
      color:{

        1: "#91cc75",
        2: "#fac858",
        3: "#ee6666",
        4: "#73c0de",
        5: "#3ba272",
        6: "#fc8452",
        7: "#9a60b4",
        8: "#ea7ccc",
        },

      series: [
        {
          name: 'sales',
          type: 'bar',
          data: [cData.booking_status_monthly, cData.building_pilling_monthly, cData.down_payment_monthly, cData.first_floor_monthly,cData.land_filling_1st_monthly,cData.land_filling_2nd_monthly,cData.land_filling_2nd_monthly]
        }
      ]
    };

    // Display the chart using the configuration items and data just specified.
    myChart.setOption(option);

    option && myChart.setOption(option);
</script>

@endsection



