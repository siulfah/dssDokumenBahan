<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = "";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

include('app/config.php');
$query = mysql_query("SELECT nama,email FROM pengguna WHERE username='$username'");
$cetak = mysql_fetch_array($query);
?>

<script src="js/dAutocomplete.js"></script>
<script type="text/javascript">
  document.write('<style>.noscript { display: none; }</style>');

  $(function(){

    if(!$(".banner-bottom").is(":visible")) $(".container.content").css("margin-top", 0);
    
    $.dAutocomplete({
      target      : '#nama_bahan',
      min_length  : 2,
      main_url    : "tentukan_bahan/data_bahan.php",
      done        : function(data){
        console.log(data);
        if(data == 1){
          $("#nama_bahan").attr("readonly", true);
        }else{
          if($("#nama_bahan").val() != ""){
            $("#nama_bahan").attr("readonly", true);
            $(".first").fadeIn("normal");
          }
        }
      }
    });

    $("#ulang").click(function(e){
      e.preventDefault();
      location.reload();
    });

    $("#sumber").change(function(){
      var pil = $(this).val();
      $(".addition").fadeOut("fast");

      setTimeout(function(){
        if(pil == 'hewani'){
          $(".jprod").fadeIn("normal");
          jprod_func();
        }else if(pil == "nabati"){
          $(".prosba").fadeIn("normal");
          prosnab_func();
        }else if(pil == "pm" || pil == "bt"){
          $(".pmbt").fadeIn("normal");
        }else if(pil == "sintetik kimia"){
          $(".sintetik-first").fadeIn("normal");
          $("#sin_sumber").change(function(){
            var pil = $(this).val();

            $(".sintetik-anor").fadeOut("normal");
            $(".sintetik-or").fadeOut("normal");

            if(pil == "organik"){
              $(".sintetik-or").fadeIn("normal");
            }else if(pil == "anorganik"){
              //$(".sintetik-or").fadeIn("normal");
              $(".sintetik-anor").fadeIn("normal");
            }
          });
        }
      }, 500);
    });

    $("#is_proses").change(function(){
      var p = $(this).val();

      setTimeout(function(){
        if(p == '1'){
          $(".the-last").fadeIn("normal");
        }else{
          $(".the-last").fadeOut("normal");
        }
      }, 500);
    });

    $("#pmbt_proses").change(function(){
      var val = $(this).val();
      if(val == "tidak"){
        $(".pmbt.last-add").fadeOut("normal");
      }else{
        $(".pmbt.last-add").fadeIn("normal");
      }
    });

    $("#sin_tambah").change(function(){
      var val = $(this).val();
      if(val == "tidak"){
        $(".sintetik-or").fadeOut("normal");
      }else{
        $(".sintetik-or").fadeIn("normal");
      }
    });

    $("#prosnab_tambahan").change(function(){
      var val = $(this).val();
      if(val == "0"){
        $(".prosnab_last").fadeOut("normal");
      }else{
        $(".prosnab_last").fadeIn("normal");
      }
    });

    $("#proses").click(function(){
      var isSumber = $(".first").is(":visible");
      var dok = "";

      if(!isSumber){
        var nama = $("#nama").val().toUpperCase(),
            email = $("#email").val(),
            bahan = $("#nama_bahan").val();

        $.getJSON("tentukan_bahan/get_bahan.php?b="+bahan, function(data){
          var sbb="", tambahan="", dok="", desk="", tk = "";
          $.each(data, function(x, dt){
            sbb = dt['sumber_bahan'];
            tambahan = dt['sbt'];
            dok = dt['dokumen'];
            desk = dt['deskripsi'];
            tk = dt["titik_kritis"];
          });

          $(".nama-hasil").html(nama);
          $(".email-hasil").html(email);

          desk = desk == null?"":desk;

          var tr =  '<tr>'+
                      '<td>'+bahan+'</td>'+
                      '<td>'+sbb+'</td>'+
                      '<td>'+tambahan+'</td>'+
                      '<td>'+tk+'</td>'+
                      '<td>'+dok+'</td>'+
                      // '<td>'+desk+'</td>'+
                    '</tr>';

          $(".box-pdpb").slideUp("normal");

          show_proses("<i class='fa fa-spin fa-spinner'></i>&nbsp;&nbsp;&nbsp; Menyimpan log dokumen...!", "proses");
          setTimeout(function(){
            $(".to-replace").remove();
            $(".body-pdpb").append(tr);
            setTimeout(function(){
              $.ajax({
                data : {"nama":nama,"email":email,"bahan":bahan,"sbb":sbb,"tambahan":tambahan,"dok":dok, "tk":tk},
                dataType : "json",
                type : "post",
                url : "tentukan_bahan/simpanlog.php",
                success : function(e){
                  show_proses("<i class='fa fa-exclamation-triangle'></i>&nbsp;&nbsp;&nbsp; Log dokumen berhasil disimpan!", "proses");
                  setTimeout(function(){
                    hide_proses();
                    $(".box-pdpb").slideDown("normal");
                    tambah_bahan();
                  }, 400);
                }
              });
            }, 500);
          }, 500);
        });
      }else{
        var sumber = $("#sumber").val(),
            b_tambah = $("#pmbt_bahan").val(),
            isProses = $("#pmbt_proses").val(),
            sbb = "", tkrit = "";

        var nama = $("#nama").val().toUpperCase(),
            email = $("#email").val(),
            bahan = $("#nama_bahan").val().toUpperCase(),
            tambahan = "Tidak Ada";

        if(sumber == "bt"){
//=============================Bahan Tambang================================//          
          sbb = "Bahan Tambang";

          if(isProses == "ya"){
            tkrit = "Bahan Penolong";

            if(b_tambah == "bahan tambang" || b_tambah == "sintetik kimia" || b_tambah == "nabati"){
              dok = "<b>Diagram Alir Proses atau Spesifikasi Teknis atau COA(Certificate Of Analysis)/Sertifikat Analisis atau Dokumen Pembelian</b>";
            }else if(b_tambah == "hewani" || b_tambah == "kompleks"){
              dok = "<b>Sertifikat Halal</b>";
            }else{
              dok = "Jika terdapat bahan aditif/penolong yang kritis maka perlu melampirkan <b>Sertifikat Halal</b> dari Badan sertifikasi halal yang diakui internasional;  atau <br> <b>Diagram alir proses dan/atau spesifikasi teknis</b> dengan melampirkan sumber mikroba";
            }
            
          }else{
            b_tambah = "tidak ada";
            tkrit = "Bukan Bahan Kritis";
            dok = "<b>COA(Certificate Of Analysis)/Sertifikat Analisis atau Dokumen Pembelian</b>";

          }

          tambahan = $("#pmbt_bahan").val();
        }else if(sumber == "pm"){
          sbb = "Mikrobial";
          tkrit = "Media Fermentasi dan Bahan Penolong";

          if(isProses == "ya"){
            if(b_tambah == "bahan tambang" || b_tambah == "sintetik kimia" || b_tambah == "nabati" || b_tambah == "proses mikrobial"){
              dok = "Jika terdapat bahan aditif/penolong yang kritis maka perlu melampirkan <b>Sertifikat Halal</b> dari Badan sertifikasi halal yang diakui internasional;  atau <br> <b>Diagram alir proses dan/atau spesifikasi teknis</b> dengan melampirkan sumber mikroba";
            }else if(b_tambah == "hewani" || b_tambah == "kompleks"){
              dok = "<b>Sertifikat Halal</b>";
            }

            tambahan = $("#pmbt_bahan").val();
          }else{
            dok = "Jika terdapat bahan aditif/penolong yang kritis maka perlu melampirkan <b>Sertifikat Halal</b> dari Badan sertifikasi halal yang diakui internasional;  atau <br> <b>Diagram alir proses dan/atau spesifikasi teknis</b> dengan melampirkan sumber mikroba";
            b_tambah = "tidak ada";

            tambahan = "Tidak Ada";
          }

//=============================HEWANI================================//      
        
        }else if(sumber == "hewani"){
          sbb = "Hewani";

          var kat = $("#jenis").val(),
              isProses = $("#is_proses").val();

          if(kat == "susu" || kat == "telur" || kat == "ikan"){
            tkrit = "Bahan Aditif dan Bahan Penolong";
          
            // dok = isProses == "1"?"SERTIFIKAT HALAL":"COA (SERTIFIKAT ANALISIS) / DOKUMEN PEMBELIAN BAHAN";
            dok = "<b>Sertifikat Halal / COA(Certificate Of Analysis) / Sertifikat Analisis atau Dokumen Pembelian</b>";
          }else{
            tkrit = "Proses Penyembelihan, Bahan Aditif, dan Bahan Penolong";

            var isHalal = $("#is_halal").val();
                // isSembelih = $("#is_sembelih").val();

            if(isHalal == "1"){
              // if(isSembelih == "1"){
              //   dok = isProses == "1"?"SERTIFIKAT HALAL":"COA (SERTIFIKAT ANALISIS) / DOKUMEN PEMBELIAN BAHAN";
              // }else{
              //   dok = "HARAM";
              // }
              dok = "<b>Sertifikat Halal</b>";
            }else{
              dok = "<b>Bahan Tidak Dapat Digunakan/HARAM</b>";
            }
          }

          if(isProses == "1"){
            tambahan = $("#last-tamb").val();
          }

//=============================NABATI================================//      

        }else if(sumber == "nabati"){
          sbb = "Nabati";

          var prosNab = $("#pros_nab").val(),
              bt = $("#prosnab_bahan").val();

          if(prosNab == "pmfk"){
            dok = "<b>Tidak Dapat Digunakan / HARAM</b>";
            bt = "Tidak Ada";
            tkrit = "Bahan Pengekstrak, Bahan Aditif, Bahan penolong dan Bahan Penyalut";
          }else if(prosNab == "pm"){
            // if(bt = "bahan tambang" || bt == "sintetik kimia" || bt == "nabati"){
            //   dok = "DIAGRAM ALIR PROSES ATAU SPESIFIKASI TEKNIS";
            // }else if(bt == "hewani"){
            //   dok = "SERTIFIKAT HALAL";
            // }else{
            //   dok = "PERSYARATAN DOKUMEN PRODUK MIKROBIAL 5.3.163";
            // }
            dok = "<b>COA (Certificate of Analysis) / Sertifikat Analisis / Dokumen Pembelian Bahan</b>";
            tkrit = "Bukan Bahan Kritis";
          }else if(prosNab == "lain"){
            var tmb = $("#prosnab_tambahan").val();

            if(tmb == "1"){
              if(bt == "bahan tambang" || bt == "sintetik kimia" || bt == "nabati"){
                dok = "<b>Diagram Alir Proses atau Spesifikasi Teknis</b>";
              }else if(bt == "hewani" || bt == "kompleks"){
                dok = "<b>Sertifikat Halal</b>";
              }else{
                dok = "Jika terdapat bahan aditif/penolong yang kritis maka perlu melampirkan <b>Sertifikat Halal</b> dari Badan sertifikasi halal yang diakui internasional;  atau <br> <b>Diagram alir proses dan/atau spesifikasi teknis</b> dengan melampirkan sumber mikroba";
              } 

              tkrit = "Bahan Penolong";
            }else{
              dok = "<b>COA (Certificate of Analysis) / Sertifikat Analisis / Dokumen Pembelian Bahan</b>";
              tkrit = "Bukan Bahan Kritis";
            }
          }else{
            dok = "COA (Certificate of Analysis) / Sertifikat Analisis / Dokumen Pembelian Bahan";
            bt = "Tidak Ada";
            tkrit = "Bukan Bahan Kritis";
          }

//=============================Sintetik Kimia================================//      
          tambahan = bt;
        }else if(sumber == "sintetik kimia"){
          sbb = "Sintetik Kimia";

          var kat = $("#sin_sumber").val(),
              sb = $("#sin_bahan").val();
              tambahan = sb;

          if(kat == "organik"){
            if(sb == "bahan tambang" || sb == "sintetik kimia" || sb == "nabati"){
              dok = "<b>Diagram Alir Proses Atau Spesifikasi Teknis</b>";
            }else if(sb == "hewani" || sb == "kompleks"){
              dok = "<b>Sertifikat Halal</b>";
            }else{
              dok = "Jika terdapat bahan aditif/penolong yang kritis maka perlu melampirkan <b>Sertifikat Halal</b> dari Badan sertifikasi halal yang diakui internasional;  atau <br> <b>Diagram alir proses dan/atau spesifikasi teknis</b> dengan melampirkan sumber mikroba";
            }
            tkrit = "Bahan Penolong, Bahan Penyalut dan Bahan Aditif";
          }else{
            if(sb == "bahan tambang" || sb == "sintetik kimia" || sb == "nabati"){
              dok = "<b>Diagram Alir Proses atau Spesifikasi Teknis</b>";
            }else if(sb == "hewani" || sb == "kompleks"){
              dok = "<b>Sertifikat Halal</b>";
            }else if(sb == "proses mikrobial"){
              dok = "Jika terdapat bahan aditif/penolong yang kritis maka perlu melampirkan <b>Sertifikat Halal</b> dari Badan sertifikasi halal yang diakui internasional;  atau <br> <b>Diagram alir proses dan/atau spesifikasi teknis</b> dengan melampirkan sumber mikroba";
            }else{
              dok = "Blank Document / COA (Certificate of Analysis) / Sertifikat Analisis / Dokumen Pembelian Bahan";
            }

            tkrit = "Bukan Bahan Kritis";
          }
        }

        // var tkrit = "";
        // switch (sbb) {
        //   case "NABATI" : tkrit = "BAHAN PENGEKSTRAK, BAHAN ADITIF, BAHAN PENOLONG DAN BAHAN PENYALUT"; break;
        //   case "HEWANI" : tkrit = "BAHAN PENOLONG"; break;
        //   case "SINTETIK KIMIA" : tkrit = "BAHAN PENOLONG, BAHAN PENYALUT DAN BAHAN ADITIF"; break;
        //   case "PRODUK MIKROBIAL" : tkrit = "MEDIA FERMENTASI DAN BAHAN PENOLONG"; break;
        //   case "BAHAN TAMBANG" : tkrit = "BAHAN PENOLONG"; break;
        // }

        $(".nama-hasil").html(nama);
        $(".email-hasil").html(email);

        var tr =  '<tr>'+
                    '<td>'+bahan+'</td>'+
                    '<td>'+sbb+'</td>'+
                    '<td>'+tambahan+'</td>'+
                    '<td>'+tkrit+'</td>'+
                    '<td>'+dok+'</td>'+
                    // '<td></td>'+
                  '</tr>';

        $(".box-pdpb").slideUp("normal");
        
        show_proses("<i class='fa fa-spin fa-spinner'></i>&nbsp;&nbsp;&nbsp; Menyimpan log dokumen...!", "proses");
        setTimeout(function(){
          $(".to-replace").remove();
          $(".body-pdpb").append(tr);
          setTimeout(function(){
            $.ajax({
              data : {"nama":nama,"email":email,"bahan":bahan,"sbb":sbb,"tambahan":tambahan,"dok":dok},
              dataType : "json",
              type : "post",
              url : "tentukan_bahan/simpanlog.php",
              success : function(e){
                show_proses("<i class='fa fa-exclamation-triangle'></i>&nbsp;&nbsp;&nbsp; Log dokumen berhasil disimpan!", "proses");
                setTimeout(function(){
                  hide_proses();
                  $(".box-pdpb").slideDown("normal");
                  tambah_bahan();
                }, 400);
              }
            });
          }, 500);
        }, 500);
      }
    });

  });

  function tambah_bahan(){
    $(".addition").fadeOut("fast");
    $(".first").fadeOut("fast");
    $("#nama_bahan").val("").attr("readonly", false).focus(); 
    $("select").each(function() { this.selectedIndex = 0 });
  }

  function jprod_func(){
    $("#jenis").change(function(){
      var pil = $(this).val();
      if(pil == 0){
        $(".other").fadeOut("normal");
        $(".last").fadeOut("normal");
      }else{
          var stat = check_jprod(pil);

          if(stat == 0){
            $(".last").fadeIn("normal");
            $(".other").fadeOut("normal");
          }else{
            $(".other").fadeIn("normal");
            $(".last").fadeIn("normal");
          }   
      }
    });
  }

  function check_jprod(pil){
    switch(pil){
      case 'telur' : return 0; break;
      case 'ikan' : return 0; break;
      case 'susu' : return 0; break;
      case 'daging' : return 1; break;
      case 'lemak' : return 1; break;
      case 'kulit' : return 1; break;
      case 'dll' : return 1; break;
    }
  }

  function prosnab_func(){
    $("#pros_nab").change(function(){
      var pil = $(this).val();
      $(".prosnab").fadeOut("normal");

      setTimeout(function(){
        if(pil == "pm"){
          $(".prosnab_last").fadeIn("normal");
          var add = '<option class="opt-add" value="tidak ada">Tidak Ada</option>';
          $("#prosnab_bahan").append(add);
        }else if(pil == "lain"){
          $(".prosnab").fadeIn("normal");
          $("#prosnab_bahan .opt-add").remove();
        }else{
          $("#prosnab_bahan .opt-add").remove();
        }
      }, 500);
    });
  }
</script>

<style type="text/css">
  .addition, .pmbt, .sintetik, .first{
    display: none;
  }
</style>

<div class="box">
  <div class="box-header">
    <h3 class="box-title" style="color:#fff;">Tentukan Dokumen</h3>
  </div>
  <div class="box-body">
    <table style="width: 100%;">
      <tr>
        <td style="width:25%;">Nama</td>
        <td>:</td>
        <td>
          <input type="text" class="form-control" name="nama" id="nama" value="<?=$cetak['nama'];?>" readonly>
        </td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>:</td>
        <td>
          <input type="text" class="form-control" name="email" id="email" value="<?=$cetak['email'];?>" readonly>
        </td>
      </tr>
      <tr>
        <td>Apakah nama bahan yang Anda gunakan?</td>
        <td>:</td>
        <td>
          <div class="form-group">
            <input type="text" name="nama_bahan" id="nama_bahan" class="form-control">
            <!--<span class="input-group-addon">-->
              <!-- <i class="fa fa-search"></i> -->
              <!--Autocomplete
            </span>-->
          </div>
        </td>
      </tr>
      <tr class="first">
        <td colspan="2"></td>
        <td>
          <p style="color:red;">
            <i class="fa fa-exclamation-triangle"></i>
            Nama bahan tidak ditemukan!
          </p>
        </td>
      </tr>
      <tr class="first">
        <td>Apakah sumber bahan baku yang Anda gunakan?</td>
        <td>:</td>
        <td>
          <select name="sumber" id="sumber">
            <option value="0">-- Pilih Sumber Bahan --</option>
            <option value="hewani">Hewani</option>
            <option value="nabati">Nabati</option>
            <option value="pm">Produk Mikrobial</option>
            <option value="bt">Bahan Tambang</option>
            <option value="sintetik kimia">Sintetik Kimia</option>
          </select>
        </td>
      </tr>
      <tr class="jprod addition">
        <td>Apakah jenis produk yang Anda gunakan?</td>
        <td>:</td>
        <td>
          <select name="jenis" id="jenis">
            <option value="0">-- Pilih Jenis Produk --</option>
            <option value="telur">Telur</option>
            <option value="ikan">Ikan</option>
            <option value="susu">Susu</option>
            <option value="daging">Daging</option>
            <option value="lemak">Lemak</option>
            <option value="kulit">Kulit</option>
            <option value="dll">Dll</option>
          </select>
        </td>
      </tr>
      <tr class="prosba addition">
        <td>Apakah ada proses pada bahan yang Anda gunakan?</td>
        <td>:</td>
        <td>
          <select name="pros_nab" id="pros_nab">
            <option value="0">-- Pilih Proses --</option>
            <option value="pmfk">Pengolahan Mikroba dan Fermentasi Khamr</option>
            <option value="pm">Pengolahan Mikroba </option>
            <option value="lain">Proses Lain</option>
            <option value="tidak">Tidak Ada</option>
          </select>
        </td>
      </tr>
      <tr class="prosnab prosnab_other addition">
        <td>Tuliskan nama proses yang Anda maksud</td>
        <td>:</td>
        <td>
          <input type="text" class="form-control" name="nama_proses" id="nama_proses">
        </td>
      </tr>
      <tr class="prosnab prosnab_other addition">
        <td>Apakah ada proses tambahan?</td>
        <td>:</td>
        <td>
          <select name="prosnab_tambahan" id="prosnab_tambahan">
            <option value="Pilih">-- Pilih Proses --</option>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
          </select>
        </td>
      </tr>
      <tr class="prosnab prosnab_last addition">
        <td>Apakah Anda menggunakan bahan tambahan?</td>
        <td>:</td>
        <td>
          <select name="prosnab_bahan" id="prosnab_bahan">
            <option value="Tidak ada">-- Pilih Sumber Bahan Tambahan --</option>
            <option value="hewani">Hewani</option>
            <option value="kompleks">Kompleks</option>
            <option value="nabati">Nabati</option>
            <option value="proses mikrobial">Proses Mikrobial</option>
            <option value="bahan tambang">Bahan Tambang</option>
            <option value="sintetik kimia">Sintetik Kimia</option>
          </select>
        </td>
      </tr>
      <tr class="pmbt addition">
        <td>Apakah ada proses pada bahan yang Anda gunakan?</td>
        <td>:</td>
        <td>
          <select name="pmbt_proses" id="pmbt_proses">
            <option value="Pilih">-- Pilih Proses --</option>
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
          </select>
        </td>
      </tr>
      <tr class="pmbt addition last-add">
        <td>Apakah Anda menggunakan bahan tambahan?</td>
        <td>:</td>
        <td>
          <select name="pmbt_bahan" id="pmbt_bahan">
            <option value="Tidak ada">-- Pilih Sumber Bahan Tambahan --</option>
            <option value="hewani">Hewani</option>
            <option value="kompleks">Kompleks</option>
            <option value="nabati">Nabati</option>
            <option value="proses mikrobial">Proses Mikrobial</option>
            <option value="bahan tambang">Bahan Tambang</option>
            <option value="sintetik kimia">Sintetik Kimia</option>
          </select>
        </td>
      </tr>
      <tr class="sintetik sintetik-first addition">
        <td>Apakah jenis sumber yang Anda gunakan?</td>
        <td>:</td>
        <td>
          <select name="sin_sumber" id="sin_sumber">
            <option value="0">-- Pilih Sumber --</option>
            <option value="organik">Organik</option>
            <option value="anorganik">Anorganik</option>
          </select>
        </td>
      </tr>
      <tr class="sintetik sintetik-anor addition">
        <td>Apakah Anda menggunakan bahan tambahan / penolong?</td>
        <td>:</td>
        <td>
          <select name="sin_tambah" id="sin_tambah">
            <option value="Pilih">-- Pilih Proses --</option>
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
          </select>
        </td>
      </tr>
      <tr class="sintetik sintetik-or addition">
        <td>Apakah sumber bahan yang Anda gunakan?</td>
        <td>:</td>
        <td>
          <select name="sin_bahan" id="sin_bahan">
            <option value="Tidak ada">-- Pilih Sumber Bahan --</option>
            <option value="hewani">Hewani</option>
            <option value="kompleks">Kompleks</option>
            <option value="nabati">Nabati</option>
            <option value="proses mikrobial">Proses Mikrobial</option>
            <option value="bahan tambang">Bahan Tambang</option>
            <option value="sintetik kimia">Sintetik Kimia</option>
          </select>
        </td>
      </tr>
      <tr class="other addition">
        <td>Apakah bahan tersebut berasal dari hewan halal?</td>
        <td>:</td>
        <td>
          <select name="is_halal" id="is_halal">
            <option value="Pilih">-- Pilih Status Halal --</option>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
          </select>
        </td>
      </tr>
      <!-- <tr class="other addition">
        <td>Apakah hewan tersebut disembelih sesuai hukum Islam & tersertifikasi oleh MUI / LPPOM MUI?</td>
        <td>:</td>
        <td>
          <select name="is_sembelih" id="is_sembelih">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
          </select>
        </td>
      </tr> -->
      <tr class="last addition">
        <td>Apakah ada proses pada bahan?</td>
        <td>:</td>
        <td>
          <select name="is_proses" id="is_proses">
            <option value="-">-- Pilih Proses --</option>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
          </select>
        </td>
      </tr>
      <tr class="the-last addition">
        <td>Apakah Anda menggunakan bahan tambahan?</td>
        <td>:</td>
        <td>
          <select name="last-tamb" id="last-tamb">
            <option value="Tidak ada">-- Pilih Sumber Bahan Tambahan --</option>
            <option value="hewani">Hewani</option>
            <option value="kompleks">Kompleks</option>
            <option value="nabati">Nabati</option>
            <option value="proses mikrobial">Proses Mikrobial</option>
            <option value="bahan tambang">Bahan Tambang</option>
            <option value="sintetik kimia">Sintetik Kimia</option>
          </select>
        </td>
      </tr>
    </table>
  </div>
  <div class="box-footer">
    <button class="btn btn-danger" id="proses">
      <i class="fa fa-share-square"></i>
      &nbsp;Proses
    </button>
    <button class="btn btn-info" id="ulang">
      <i class="fa fa-refresh"></i>
      &nbsp;Ulangi
    </button>
  </div>
</div>
<br>
<div class="box box-pdpb" style="display:none;" id="id-print-hasil">
  <div class="box-header" style="background-color:#00a65a">
    <h3 class="box-title">Hasil Penentu Dokumen Pendukung Bahan</h3>
  </div>
  <div class="box-body">
    <table style="width:100%">
      <tr>
        <td style="width:25%;">Nama</td>
        <td style="width:10px;">:</td>
        <td>
          <p class="nama-hasil"></p>
        </td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>:</td>
        <td>
          <p class="email-hasil"></p>
        </td>
      </tr>
    </table>
    <br>
    <table style="width:100%" class="table table-bordered">
      <thead>
        <tr>
          <th>Nama Bahan</th>
          <th>Sumber Bahan Baku</th>
          <th>Sumber Bahan Tambahan</th>
          <th>Titik Kritis Bahan</th>
          <th>Jenis Dokumen Pendukung Bahan</th>
          <!-- <th>Deskripsi Dokumen</th> -->
        </tr>
      </thead>
      <tbody class="body-pdpb">
        <tr class="to-replace">
          <td colspan="6">
            Belum ada data!
          </td>
        </tr>
      </tbody>
    </table>
    <div class="box-footer">
        <script>
          function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
          }
        </script>
        <button onclick="printContent('id-print-hasil')" class="btn btn-success">
          <i class="glyphicon glyphicon-print"></i>
          &nbsp;Print
        </button>

      </div>
  </div>
  
</div>