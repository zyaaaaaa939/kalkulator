<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-gray-900 flex items-center justify-center min-h-screen " >

    <?php
    $bilangan1 = "";
    $bilangan2 = "";
    $hasil = "";
    $operasi = "";

    if(isset($_POST['hitung'])) {
        $bilangan1 = $_POST['bil1'];
        $bilangan2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];

        switch($operasi) {
            case'tambah':
                $hasil = $bilangan1 + $bilangan2;
                break;

            case'kurang':
                $hasil = $bilangan1 - $bilangan2;
                break;

            case'kali':
                $hasil = $bilangan1 * $bilangan2;
                break;

            case'bagi':
                $hasil = $bilangan1 / $bilangan2;
                break;
        }
    }

    ?>

    <div class="bg-white p-8 raunded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center mb-5 ">
          Kalkulator  
        </h2>
        <form action="" method="POST">
            <input type="text" name="bil1" 
            class="w-full p-3 mb-4 border
             border-gray-300 raunded-md" autocomplete="off" 
             placeholder="Masukan bilangan pertama" value="<?php echo $bilangan1; ?>>
        

       
            <input type="text" name="bil2" 
            class="w-full p-3 mb-4 border
             border-gray-300 raunded-md" autocomplete="off" 
             placeholder="Masukan bilangan kedua" value="<?php echo $hasil; ?>>
        

        <select name="operasi"  class="w-full p-3 mb-4 border
             border-gray-300 raunded-md">
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">x</option>
            <option value="bagi">/</option>
        </select>

        <input type="submit" name="hitung" value= "hitung"
         class="w-full p-3 mb-4 bg-violet-500 border
        border-gray-300 raunded-md hover hover-bg-violet-300">

       
            <input type="text"
            class="w-full p-3 mb-4 border
             border-gray-300 raunded-md" readonly value="<?php echo $hasil; ?>">
        </form>


    </div>
  </body>
</html>