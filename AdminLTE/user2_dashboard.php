<?php
    $sql1 = "select * from richpig.raw_data where address = 3001 and board_number=4 order by create_at desc limit 1";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);

    $sql2 = "select * from richpig.raw_data where address = 3001 and board_number=5 order by create_at desc limit 1";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

    $sql3 = "select * from richpig.raw_data where address = 3001 and board_number=6 order by create_at desc limit 1";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);

?>

<section class="content">
    <div class="container-fluid">
        <h3>버섯왕 농업회사법인</h3>
        <div class="row">
            <div class="col-lg-2 col-12">
                <div class="info-box bg-info">
                    <div class="info-box-content">
                        <span class="info-box-text">ID 4 - 온도</span>
                        <span class="info-box-number"><?php echo $row1['data1'];?> °C</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data1'];?>%"></div>
                        </div>
                        <span class="progress-description">
                            조회 시점 : <?php echo substr($row1['create_at'],5,11);?> 
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div class="info-box bg-info">
                    <div class="info-box-content">
                        <span class="info-box-text">ID 4 - 습도</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>%"></div>
                        </div>
                        <span class="progress-description">
                            조회 시점 : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div class="info-box bg-success">
                    <div class="info-box-content">
                        <span class="info-box-text">ID 5 - 온도</span>
                        <span class="info-box-number"><?php echo $row2['data1'];?> °C </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row2['data1'];?> %"></div>
                        </div>
                        <span class="progress-description">
                            조회 시점 : <?php echo substr($row2['create_at'],5,11);?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div class="info-box bg-success">
                    <div class="info-box-content">
                        <span class="info-box-text">ID 5 - 습도</span>
                        <span class="info-box-number"><?php echo $row2['data2'];?> % </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row2['data2'];?>"></div>
                        </div>
                        <span class="progress-description">
                            조회 시점 : <?php echo substr($row2['create_at'],5,11);?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div class="info-box bg-warning">
                    <div class="info-box-content">
                        <span class="info-box-text">ID 6 - 배지온도</span>
                        <span class="info-box-number"><?php echo $row3['data1'];?> °C </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row3['data1'];?>"></div>
                        </div>
                        <span class="progress-description">
                            조회 시점 : <?php echo substr($row3['create_at'],5,11);?>
                        </span>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.row -->
        <!-- Main row -->

 
        <!-- /.row -->
        <!-- Main row -->


        <div class="row">



            <div class="col-lg-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-2 px-3"><h3 class="card-title"></h3></li>
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">데이터변화</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <!-- 송화버섯 -->
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    ID 4 - 온도 (°C)
                                                </h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="kingLine_Chart_1" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    ID 4 - 습도 (%)
                                                </h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="kingLine_Chart_2" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    ID 5 - 온도 (°C)
                                                </h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="kingLine_Chart_3" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    ID 5 - 습도 (%)
                                                </h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="kingLine_Chart_4" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    ID 6 - 배지온도 (°C)
                                                </h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="kingLine_Chart_5" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.card -->

                </div>
            </div>

        </div>


    
    
</section>
<script src="plugins/jquery/jquery.min.js"></script>

<script>
    $(function () {
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

       

        Get_kingLine_Chart_1_Data()

        // 데이터 불러오기
        function Get_kingLine_Chart_1_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/user2_Ajax_kingLine_Chart_1.data.php",
                dataType: 'json',
                success: function (data) {
                    _kingLine_Chart_1_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        // 데이터 바인딩 ( 데이터 갖고온것을 차트구조에 맡게 설정 및 html에 뿌려주기 )
        function _kingLine_Chart_1_update(_data) {
            const dataset = _data.pay_load.dataset
            
            $.plot('#kingLine_Chart_1', [dataset['tds_in'],dataset['tds_out']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                  show:true,
                  content: "데이터 : %y 도 <br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }


        Get_kingLine_Chart_2_Data()

        function Get_kingLine_Chart_2_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/user2_Ajax_kingLine_Chart_2.data.php",
                dataType: 'json',
                success: function (data) {
                    _kingLine_Chart_2_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _kingLine_Chart_2_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#kingLine_Chart_2', [dataset['pressure_in'],dataset['pressure_out']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                  show:true,
                  content: "데이터 : %y % <br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_kingLine_Chart_3_Data()

        function Get_kingLine_Chart_3_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/user2_Ajax_kingLine_Chart_3.data.php",
                dataType: 'json',
                success: function (data) {
                    _kingLine_Chart_3_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _kingLine_Chart_3_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#kingLine_Chart_3', [dataset['water_in'],dataset['water_out']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                  show:true,
                  content: "데이터 : %y 도 <br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_kingLine_Chart_4_Data()

        function Get_kingLine_Chart_4_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/user2_Ajax_kingLine_Chart_4.data.php",
                dataType: 'json',
                success: function (data) {
                    _kingLine_Chart_4_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _kingLine_Chart_4_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#kingLine_Chart_4', [dataset['throughput']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                  show:true,
                  content: "데이터 : %y % <br/> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_kingLine_Chart_5_Data()

        function Get_kingLine_Chart_5_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/user2_Ajax_kingLine_Chart_5.data.php",
                dataType: 'json',
                success: function (data) {
                    _kingLine_Chart_5_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _kingLine_Chart_5_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#kingLine_Chart_5', [dataset['throughput']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                  show:true,
                  content: "데이터 : %y 도 <br/> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

    });
</script>
