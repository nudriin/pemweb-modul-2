<?php
session_start();

if (!isset($_SESSION['login']))
    header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./tailwind.config.js"></script>
</head>

<body>
    <script>
        Swal.fire({
            title: 'Sukses',
            text: 'Berhasil login',
            icon: 'success',
            confirmButtonText: 'OK',
            color: '#fff',
            background: '#1E293B'
        })
    </script>
    <section class="flex items-center justify-center min-h-screen text-white bg-slate-900">
            <div class="space-y-5 text-center">
                <h1 class="text-4xl font-bold font-futura"><span class="text-white">Selamat Datang</span> <span class="px-2 bg-lime -skew-y-2 text-dark-slate"><?= $_SESSION['login'] ?></span></h1>
                <p>Anda sudah berhasil login</p>
                <div class="space-x-4">
                    <button class="p-3 border-2 rounded-xl border-lime hover:shadow-md hover:bg-slate-800">About Us</button>
                        <button class="p-3 text-slate-900 rounded-xl bg-lime hover:shadow-md hover:bg-purple hover:text-white">Click it</button>
                </div>
            </div>
        </section>
</body>

</html>