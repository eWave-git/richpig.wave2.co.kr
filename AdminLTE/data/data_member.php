
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">사용자 관리 페이지</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                            사용자 생성
                        </button>
                        <br/><br/>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>순번</th>
                                <th>ID</th>
                                <th>사용자명</th>
                                <th>생성날짜</th>
                                <th>수정/삭제</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($conn,"SELECT * FROM member WHERE `id`!='admin'");
                            while($row = mysqli_fetch_array($query)) {
                                $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['create_at'];?></td>
                                    <td>
                                        <button type="button" class="btn btn-lg btn-success" style="user-select: auto;" data-idx="<?php echo $row['idx'];?>" >EDIT</button>
                                        <button type="button" class="btn btn-lg btn-danger" style="user-select: auto;" data-idx="<?php echo $row['idx'];?>" >DELETE</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <!--    
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                            -->
                            </tfoot>
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


<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">사용자 추가</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="member">
                    <input type="hidden" name="mode" value="create">
                    <input type="hidden" name="idx" value="">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ID설정</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">사용자명</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">암호설정</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">사용자 타입</label>
                        <div class="col-sm-10">
<!--                            <input type="text" class="form-control" id="type" name="type">-->
                            <select class="custom-select rounded-0" id="type" name="type">
                                <option value="admin">관리자</option>
                                <option value="user">사용자</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">추가 설명</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                <button type="button" class="btn btn-primary" name="save">저장하기</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>

    $(function () {
        $("[name='save']").click(function(){

            $.ajax({
                url:'../conf/memberAction.php',
                type:'post',
                data:$("[name='member']").serialize(),
                dataType: "json",
                success:function(obj){

                    if (obj.pay_load.success == "success") {
                        alert("저장 되었습니다.");
                        location.reload()
                    }
                }
            })


        });

        $(".btn-success").click(function() {

            $("[name='mode']").val('select');
            $.ajax({
                url:'../conf/memberAction.php',
                type:'post',
                data: {mode:$("[name='mode']").val(), idx:$(this).data('idx')},
                dataType: "json",
                success:function(obj){

                    if (obj.pay_load.success == "success") {
                        $("[name='mode']").val('edit');
                        $("[name='idx']").val(obj.pay_load.result.idx);
                        $("[name='id']").val(obj.pay_load.result.id);
                        $("[name='name']").val(obj.pay_load.result.name);

                        $('#modal-lg').modal('show');
                    }

                }
            })


        })

        $(".btn-danger").click(function() {
            $.ajax({
                url:'../conf/memberAction.php',
                type:'post',
                data: {mode:'delete', idx:$(this).data('idx')},
                dataType: "json",
                success:function(obj){

                    if (obj.pay_load.success == "success") {
                        alert("저장 되었습니다.");
                        location.reload()
                    }

                }
            })
        })
    });
</script>