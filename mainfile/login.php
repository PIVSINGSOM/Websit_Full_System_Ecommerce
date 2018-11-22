 <div class="container-fuild" >
  <div class="container">

    <h1 class="title" style="border-bottom: 0.5px solid #bfbfbf; margin-top:30px;">เข้าสู่ระบบ/ลงทะเบียน <br><br></h1>


  <div class="tab-content">

    <div id="register" class="tab-pane fade in ">
      <div class="row">

        <div class="col-md-6">
          <div class="jumbotron" style="padding: 30px;">
            <h2 class="title">ลงทะเบียน</h2>
            <br>
            <h5>หากคุณเคยลงทะเบียนแล้วกรุณาเข้าสู่ระบบ</h5>
            <br>

            <form  name="register" action="mainfile/check_register.php" method="post">
              <div class="form-group ">
                <label >ชื่อ-นามสกุล:<span class="required" style="color: red"> *</span></label>
                <input type="text" class="form-control" name="name"  >
              </div>
              <div class="form-group">
                <label for="pwd">ที่อยู่:<span class="required" style="color: red"> *</span></label>
                <textarea class="form-control" name="address"></textarea>
              </div>
              <div class="form-group">
                <label> เบอร์โทรศัพท์:<span class="required" style="color: red"> *</span></label>
                <input type="text" class="form-control" name="tel">
              </div>
              <div class="form-group">
                <label >อีเมลล์:<span class="required" style="color: red"> *</span></label>
                <input type="text" class="form-control"  name="email" >
              </div>
              <div class="form-group">
                <label >ชื่อผู้ใช้งาน:<span class="required" style="color: red"> *</span></label>
                <input type="text" class="form-control" name="user">
              </div>
              <div class="form-group">
                <label >รหัสผ่าน:<span class="required" style="color: red"> *</span></label>
                <input type="password" class="form-control" name="pass" >
              </div>
              <button type="submit" name="btnSubmit" class="btn btn-success">ลงทะเบียน</button>
            </form>
          </div>
        </div>

        <div class="col-md-6">
          <h2 class="title">เข้าสู่ระบบ</h2>
          <br>
          <h5>หากคุณเคยลงทะเบียนมาก่อนหน้าแล้ว. กรุณาเข้าสู่ระบบ</h5>
          <br>
          <a data-toggle="pill" href="#login"><button  type="submit" class="btn btn-danger" >เข้าสู่ระบบ</button></a>
        </div>
      </div><!--row -->
    </div><!--register -->


    <div id="login" class="tab-pane fade in active">
      <div class="row">

        <div class="col-md-6">
          <h2 class="title">ลงทะเบียน</h2>
          <br>
          <h5>หากคุณยังไม่เคยลงทะเบียนกับเรา. กรุณาลงทะเบียนก่อนใช้บริการ</h5>
          <br>
          <a  data-toggle="pill" href="#register"><button type="submit" class="btn btn-success" >ลงทะเบียน</button></a>
        </div>


        <div class="col-md-6">
          <div class="jumbotron" style="padding: 30px;">
            <h2 class="title">เข้าสู่ระบบ</h2>
            <br>
            <h5>หากคุณเคยลงทะเบียนมาก่อนหน้าแล้วกรุณาเข้าสู่ระบบ</h5>
            <br>

            <form action="mainfile/check_login.php" method="post" >

              <div class="form-group">
                <label >ชื่อผู้ใช้งาน:<span class="required" style="color: red"> *</span></label>
                <input ype="text" required class="form-control" name="username" " >
              </div>

              <div class="form-group">
                <label >รหัสผ่าน:<span class="required" style="color: red"> *</span></label>
                <input type="password" required class="form-control" name="password"  >
              </div>

              <button type="submit" name="login" class="btn btn-danger">เข้าสู่ระบบ</button><a href="http://localhost/website/index.php?pagemenu=reset-password" style="text-decoration: none;"> ลืมรหัสผ่าน?</a>
            </form>


          </div>
        </div>

      </div><!--row -->
    </div>
  </div><!--login -->

</div><!--tab-content -->







</div>
</div>
