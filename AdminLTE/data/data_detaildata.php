
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="frm" name="frm" action=""  method="post">
        <div class="row">
            <div class="col-md-2">

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">검색 조건</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">

                            <label for="exampleInputEmail1">장소 선택</label>
                            <select class="custom-select rounded-0" id="md_id" name="md_id">
                                <option value="">선택하세요.</option>
                                <option value="301">송화</option>
                                <option value="401">표고</option>
                                <option value="101">매일</option>
                            </select>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="exampleInputEmail1">센서</label>
                            <select class="custom-select rounded-0" id="sensor" name="sensor">
                                <option value="">선택하세요.</option>
                                <option value="data1">온도</option>
                                <option value="data2">습도</option>
                                <option value="data3">co2</option>
                                <option value="data4">조도</option>
                                <option value="data1">-</option>
                                <option value="data1">-</option>
                                <option value="data1">-</option>
                                <option value="bar1">bar1</option>
                            </select>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="exampleInputEmail1">날짜</label>
                            <div class="input-group">
                                <input type="text" class="form-control float-right" id="reservationtime" name="sdateAtedate">
                            </div>
                        </div>

                        <hr>

                        <button type="button" class="btn btn-block bg-gradient-primary" id="search">검색</button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-body">
                        <div id="_chart" style="height: 700px;"></div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        </form>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->



<!-- /.modal -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>

    $(function () {
        $("#search").click(function () {

            if ($("#md_id").val() == "") {
                alert("장소 선택 필요");
                return false;
            }

            if ($("#sensor").val() == "") {
                alert("센서 선택 필요");
                return false;
            }

            if ($("#reservationtime").val() == "") {
                alert("날짜 선택 필요");
                return false;
            }

            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/AjaxAll.data.php",
                type:'post',
                data: {md_id:$("[name='md_id']").val(), sensor:$("[name='sensor']").val(), sdateAtedate:$("[name='sdateAtedate']").val()},
                dataType: 'json',
                success: function (data) {
                    if (data.pay_load.datatype == "bar1") {
                        alert("1"+data.pay_load.datatype);
                        update_type_2(data,data.pay_load.datatype)
                    } else {
                        alert("2"+data.pay_load.datatype);
                        update_type_1(data,data.pay_load.datatype)
                    }

                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        })

        function update_type_1(_data,type) {
            const dataset = _data.pay_load.dataset

            $.plot('#_chart', [dataset[type]], {
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

        function update_type_2(_data,type) {
            const dataset = _data.pay_load.dataset

            $.plot('#_chart', [dataset[type]], {
                grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true, barWidth: 0.5, align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }
    });
</script>