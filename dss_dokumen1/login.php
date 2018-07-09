<div class="container">
<div class="blog" style="margin-top: -60pt;">
    <div class="col-md-1 events-left">
    </div>
     <div class="col-md-4 events-left">
        <div class="events-grids">
        <div class="col-md-12 events-grid">
            <div class="mnth-date">
                <div class="col-xs-5 mnth-date-left">
                    <h4>Login<span>SPK PDPB</span></h4>
                </div>
                <div class="col-xs-7 mnth-date-right">
                    <p>Silahkan login terlebih dahulu!<br>Masukkan Username dan Password Anda!</p>
                </div>
                <div class="clearfix"> </div>
                <div class="grid_3 grid_5 col-md-12" align="center">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <span><strong>Login</strong></span>
                      </div>
                      <div class="panel-body">
                        <form class="form-horizontal" action="proses.php?hal=login" method="post">
                           
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="username" type="text" class="form-control" required="required" placeholder="Username">
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="password" type="password" class="form-control" required="required" placeholder="Password">
                            </div>
                            <div class="clearfix"></div>

                            <h3>
                            <button type="submit" class="btn btn-primary" value="Login">Login</button>
                            </h3>

                        </form>
                      </div>
                    </div>                      
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-1 events-left">
    </div>
    
    <div class="col-md-6 events-right">
        <div class="col-md-10 events-grid">
            <div class="mnth-date">
                <div class="col-xs-5 mnth-date-left">
                    <h4>Buat Akun<span>SPK PDPB</span></h4>
                </div>
                <div class="col-xs-7 mnth-date-right">
                    <p>Silahkan Lakukan <b>pendaftaran</b> terlebih dahulu sebelum menggunakan sistem ini. Lengkapi form dibawah ini!</p>
                </div>
                <div class="clearfix"> </div>
                <div class="grid_3 grid_5 col-lg-12" align="center">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <span><strong>Pendaftar Akun</strong></span>
                      </div>
                      <div class="panel-body">
                        <?php
                            $pesan_get = "";
                            if (isset($_GET['pesan'])) {
                                $pesan_get = $_GET['pesan'];
                            }
                            if($pesan=$pesan_get){
                                echo "<span><center>$pesan</center></span><br>";
                            }else{
                                $sid = session_id();
                                if(!$sid){
                                    session_start();
                                    $sid = session_id();
                                }           
                        ?>
                        <form class="form-horizontal" action="proses.php?hal=registrasi" method="post">
                            <!--Nama-->
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="nama" type="text" class="form-control" required="required" placeholder="Nama Pengguna/ Perusahaan">
                            </div>
                            <div class="clearfix"></div>
                           <!--Alamat-->
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <textarea class="form-control" rows="3" name="alamat" required="required" placeholder="Alamat"></textarea>
                            </div>
                            <div class="clearfix"></div>
                            <!--Username-->
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="username" type="text" class="form-control" required="required" placeholder="Username">
                            </div>
                            <div class="clearfix"></div>
                            <!--Password-->
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="password" type="password" class="form-control" pattern=".{6,}" required="required" placeholder="Password Min. 6 Karakter">
                            </div>
                            <div class="clearfix"></div>
                            <!--Email-->
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" type="text" class="form-control" required="required" placeholder="Email (email@email.com)">
                            </div>
                            <div class="clearfix"></div>
                            <!--Telepon-->
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                <input name="telepon" type="number" class="form-control" required="required" placeholder="Telepon">
                            </div>
                            <div class="clearfix"></div>
                            <!--Chaptca
                            <div class="input-group input-group-md">   
                                <?php
                                    //mt_srand((double)microtime()*1000000);
                                    //$angka1 = mt_rand(0,9);
                                    //$angka2 = mt_rand(0,9);
                                    //$angka3 = mt_rand(0,9);
                                    //$angka4 = mt_rand(0,9);
                                    //$angka5 = mt_rand(0,9);
                                    //$angka="$angka1$angka2$angka3$angka4$angka5";
                                    //$HTTP_SESSION_VARS["angka"] = $angka;
                                ?>                
                                <span>Masukkan angka ini:&nbsp;<img src="captcha.php?sid=<?=$sid?>" alt="Security Number"></span>
                                &nbsp; &nbsp; &nbsp;
                                <input type="number" name="captcha" class="form-control" required="required" maxlength="5"><font color="red"><b> *</b></font>
                            </div>
                            <div class="clearfix"></div>-->
                            <!--BUtton Proses-->
                            <h3>
                            <button type="reset" class="btn btn-primary" value="Reset">Reset</button>
                            <button type="submit" class="btn btn-primary" value="Simpan">Daftar</button>
                            </h3>
                        </form>
                        <?php } ?>
                      </div>
                    </div>                      
                </div>
            </div>
        </div>
    </div>


</div>
</div>