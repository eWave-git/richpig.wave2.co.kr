<?php
include_once "../connect.php";
?>





<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="frm" name="frm" action="/conf/downloadAction.php"  method="get">
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

                                <label for="exampleInputEmail1">농장명</label>
                                <select class="custom-select rounded-0" id="md_id" name="md_id">
                                    <option value="">선택하세요.</option>
                                    <option value="101">송화</option>
                                    <option value="9999">전체</option>
                                </select>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">센서</label>
                                <select class="custom-select rounded-0" id="sensor" name="sensor">
                                    <option value="">선택하세요.</option>
                                    <option value="data1">온도</option>
                                    <option value="TDSOUT">TDS OUT</option>
                                    <option value="PRESSUREIN">압력 IN</option>
                                    <option value="PRESSUREOUT">압력 OUT</option>
                                    <option value="WATERIN">유량 IN</option>
                                    <option value="WATEROUT">유량 OUT</option>
                                    <option value="THROUGHPUT">수처리량</option>
                                    <option value="POWER">전력사용량</option>
                                    <option value="dataAll">전체</option>
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

                            <button type="submit" class="btn btn-block bg-gradient-primary" id="search">CSV 다운로드</button>
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


        })


    });
</script>