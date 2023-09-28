
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form name="frm" action="../conf/passwordChangeAction.php" method="post">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">비밀 번호 변경</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="card-body row">
                                <div class="col-12">

                                    <div class="form-group">
                                        <label for="inputSubject">비밀번호</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">6자리 ~ 20자리 이내 영문, 숫자, 특수문자 중 2가지 이상을 혼합하여 입력해주세요.</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" name="btn" class="btn btn-primary" >저장</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>

    $(function () {
        $("[name='btn']").click(function () {
            var pw = $("#password").val();
            var num = pw.search(/[0-9]/g);
            var eng = pw.search(/[a-z]/ig);
            var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if(pw.length < 6 || pw.length > 20){
                alert("6자리 ~ 20자리 이내로 입력해주세요.");
                return false;
            }else if(pw.search(/\s/) != -1){
                alert("비밀번호는 공백 없이 입력해주세요.");
                return false;
            }else if( (num < 0 && eng < 0) || (eng < 0 && spe < 0) || (spe < 0 && num < 0) ){
                alert("영문, 숫자, 특수문자 중 2가지 이상을 혼합하여 입력해주세요.");
                return false;
            }else {
                $("[name='frm']").submit();
            }
        })
    });
</script>