 <?php
 
 require_once "koneksi.php";
//  //dalam kurung kotak menyamakan database
// $id_penjualan           = $_POST['tpenjualan']; 
// $id_pengguna           = $_POST['tid']; 
// $id_provinsi            = $_POST['tprov']; 
// $id_kota                = $_POST['tkota']; 
// $id_kecamatan           = $_POST['tkec']; 
// $id_kelurahan           = $_POST['tkel']; 
// $judul_rumah            = $_POST['tjudul']; 
// $alamat_rumah            = $_POST['talamat']; 
// $deskripsi_rumah        = $_POST['tdesc'];
// $harga_rumah            = $_POST['tharga'];

// // $id_penjualan           = null; 
// // $id_pengguna           = "10"; 
// // $id_provinsi            = "1"; 
// // $id_kota                = "1"; 
// // $id_kecamatan           = "2"; 
// // $id_kelurahan           = "4";  
// // $judul_rumah            = "Rumah Megah"; 
// // $alamat_rumah            = "Gubeng Kertajaya no.20"; 
// // $deskripsi_rumah        = "2 kamar,3 kamar mandi";
// // $harga_rumah            = "250.000.000";

 
// if(!empty($id_provinsi) && !empty($id_kota) && !empty($id_kecamatan) && 
// !empty($id_kelurahan) && !empty($judul_rumah) && !empty($deskripsi_rumah)&& !empty($harga_rumah)){
 
//     $sqlCheck = "SELECT COUNT(*) FROM rumah join pengguna using (ID_PENGGUNA)
//                     WHERE username_pembeli='$username_pembeli' OR email_pembeli='$email_pembeli'";
//     $queryCheck = mysqli_query($conn,$sqlCheck);
//     $hasilCheck = mysqli_fetch_array($queryCheck);
//     if($hasilCheck[0] == 0){
//         $sql = "INSERT INTO rumah (id_provinsi,id_kota,id_kecamatan,id_kelurahan,alamat_rumah,deskripsi_rumah,harga_rumah) VALUES
//         ('$id_provinsi','$id_kota','$id_kecamatan','$id_kelurahan','$alamat_rumah','$deskripsi_rumah','$harga_rumah')";
 
//         try {
//             $query = mysqli_query($conn,$sql);
//             if(mysqli_affected_rows($conn) > 0){
//                 $data['status'] = true;
//                 $data['result'] = "Berhasil";
//             }else{
//                 $data['status'] = false;
//                 $data['result'] = "Gagal";
//             }
//         } catch (\Throwable $th) {
//             $data['status'] = false;
//             $data['result'] = "Error : ".$th->getMessage();
//         }
        
 
        
//     }else{
//         $data['status'] = false;
//         $data['result'] = "Gagal, Data Sudah Ada";
//     }
 
     
 
// }
// else{
//     $data['status'] = false;
//     $data['result'] = "Gagal,  tidak boleh kosong!";
// }
 
// echo json_encode($data);
// // print_r(json_encode($data));
 

    $id_penjualan           = $_POST['tpenjualan']; 
    $id_pengguna            = $_POST['tid']; 
    $id_kelurahan           = $_POST['tkel']; 
    $judul_rumah            = $_POST['tjudul']; 
    $alamat_rumah           = $_POST['talamat']; 
    $deskripsi_rumah        = $_POST['tdesc'];
    $harga_rumah            = $_POST['tharga'];

    $foto_rumah             = $_POST['tfoto'];
	$path                   = "Gambar/".$_POST['tjudul'].".jpeg";
	$namafile               = $_POST['tjudul'].".jpeg";

    // $id_kelurahan           = "1"; 
    // $id_pengguna            = "10"; 
    // $judul_rumah            = "Rumah Siap Huni"; 
    // $alamat_rumah           = "Ampel Sini blok c no. 17"; 
    // $deskripsi_rumah        = "Kamar Mandi 4,Kamar Mandi 3";
    // $harga_rumah            = "550.000.000";

    // $foto_rumah             = null;

    if(!empty($id_kelurahan) && !empty($judul_rumah) && !empty($alamat_rumah) && 
        !empty($deskripsi_rumah) && !empty($harga_rumah)){
        $sql = "INSERT INTO rumah (ID_KELURAHAN ,JUDUL_RUMAH,ALAMAT_RUMAH,DESKRIPSI_RUMAH,HARGA_RUMAH,GAMBAR_RUMAH) VALUES
        ('$id_kelurahan','$judul_rumah','$alamat_rumah','$deskripsi_rumah','$harga_rumah','$foto_rumah')";
        
        try {
            if ( mysqli_query($conn, $sql) ) {
                if ( file_put_contents( $path, base64_decode($foto_rumah) ) ) {
                    $result['success'] = "1";
                    $result['message'] = "success";

                    echo json_encode($result);
                    mysqli_close($conn);
                    // $data['status'] = true;
                    // $data['result'] = "Berhasil";
        
                    // echo json_encode($data);
                    // mysqli_close($conn);
        
                }
                // $data['status'] = true;
                // $data['result'] = "Berhasil";
    
                // echo json_encode($data);
                // mysqli_close($conn);
            } else {
                    $result["success"] = "0";
                    $result["message"] = "error";
            
                    echo json_encode($result);
                    mysqli_close($conn);
            }
        } catch (\Throwable $th) {
            $result["success"] = false;
            $result["message"] = "Error : ".$th->getMessage();
        }
    }
    else{
        $result["success"] = false;
        $result["message"] = "Gagal,  tidak boleh kosong!";
    }

 
?> 