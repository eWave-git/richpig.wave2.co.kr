<?php
//$individual[] = "27986042-bb53-45e2-9d3b-a33d54697e89";
//$individual[] = "4470ae93-f414-4a33-b050-953f4264d41a";
//push_send("test", "test 입니다.[전체]", $individual)

?>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">경보 발송 내역</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <br/><br/>
                        <table id="example1" class="table table-bordered table-striped">
                            <colgroup>
                                <col width="10%">
                                <col width="20%">
                                <col width="">
                                <col width="10%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>순번</th>
                                <th>타이틀</th>
                                <th>내용</th>
                                <th>발송날짜</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($conn,"SELECT * FROM push_send_data where send_YN = 'Y' order by idx desc");
                            while($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['idx'];?></td>
                                    <td><?php echo $row['push_title'];?></td>
                                    <td><?php echo $row['push_content'];?></td>
                                    <td><?php echo $row['create_at'];?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- /.modal -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>

    $(function () {

    });
</script>