<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['hapus_data'])) {
    $nama = htmlspecialchars ($_POST['nama']);
    $nilai_tugas = floatval ($_POST['nilai_tugas']);
    $nilai_uts = floatval ($_POST['nilai_uts']);
    $nilai_uas = floatval ($_POST['nilai_uas']);

    $nilai_akhir = $nilai_tugas * 0.3 + $nilai_uas * 0.3 + $nilai_uts * 0.4 ;

    if($nilai_akhir >= 85){
        $kategori = 'A';
    } elseif ($nilai_akhir >= 70){
        $kategori = 'B';
    } elseif ($nilai_akhir >= 60){
        $kategori = 'C';
    } elseif ($nilai_akhir >= 50){
        $kategori = 'D';
    } else {
        $kategori = 'E';
    }

    $_SESSION['data_nilai'][] = [
        'nama' => $nama,
        'nilai_tugas' => number_format($nilai_tugas, 2),
        'nilai_uts' => number_format($nilai_uts, 2),
        'nilai_uas' => number_format($nilai_uas, 2),
        'nilai_akhir' => number_format($nilai_akhir, 2),
        'kategori' => $kategori
    ];
}
if(isset($_POST['hapus_data'])){
    $_SESSION['data_nilai'] = [];
    
}

?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Form Input Nilai Siswa</title>
  </head>
  <body class="bg-stone-100 flex items-center justify-center min-h-screen p-4 gap-4">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-5">
          Form Input Nilai Siswa
        </h2> 
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="nama">
                    Nama Lengkap
                </label>
                <input type="text" name="nama" id="nama"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    autocomplete="off" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="nilai_tugas">
                    Nilai Tugas
                </label>
                <input type="text" name="nilai_tugas" id="nilai_tugas"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    autocomplete="off" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="nilai_uts">
                    Nilai UTS
                </label>
                <input type="text" name="nilai_uts" id="nilai_uts"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    autocomplete="off" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="nilai_uas">
                    Nilai UAS
                </label>
                <input type="text" name="nilai_uas" id="nilai_uas"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    autocomplete="off" required>
            </div>

            <div class="mt-6">
                <button type="submit" 
                    class="w-full bg-blue-500 text-white py-3 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                    Hitung Nilai
                </button>
            </div>
        </form>
    </div>

    
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3sxl">
      <h2 class="text-2xl font-semibold text-center mb-5">
          Hasil penilaian
        </h2> 
        <table class="min-w-full bg-white border border-gray-300 rounded-md">
              <thead>
                <tr class="bg-gray-100">
                  <th class="py-2 px-4 border-b text-left">NAMA</th>
                  <th class="py-2 px-4 border-b text-left">NILAI AKHIR</th>
                  <th class="py-2 px-4 border-b text-left">NILAI TUGAS</th>
                  <th class="py-2 px-4 border-b text-left">NILAI UTS</th>
                  <th class="py-2 px-4 border-b text-left">NILAI UAS</th>
                  <th class="py-2 px-4 border-b text-left">KATEGORI</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($_SESSION['data_nilai'])):?>
                 <?php foreach($_SESSION['data_nilai']as $data):?>
                  <tr>
                    <td class="py-2 px-4 border-b"><?php echo $data['nama'];?> </td>
                    <td class="py-2 px-4 border-b"><?php echo $data['nilai_akhir'];?></td>
                    <td class="py-2 px-4 border-b"><?php echo $data['nilai_tugas'];?></td>
                    <td class="py-2 px-4 border-b"><?php echo $data['nilai_uts'];?></td>
                    <td class="py-2 px-4 border-b"><?php echo $data['nilai_uas'];?></td>
                    <td class="py-2 px-4 border-b"><?php echo $data['kategori'];?></td>
                  </tr>
                  <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="3" class="py-2 px-4 text-center text-gray-500">Tidak ada data untuk ditampilkan.</td>
            </tr>
          <?php endif; ?>
              </tbody>
            </table>

        <div class="mt-6">
            <form action="" method="POST">
                <button type="submit" name="hapus_data"
                    class="w-full bg-red-500 text-white py-3 px-4 rounded-md hover:bg-red-600 transition duration-300">
                    Hapus semua
                </button>
             </form>

</div>

  </body>
</html>