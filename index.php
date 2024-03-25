<?php
session_start();
$username;
$password;
$user;
$pass;
$x = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $user = strlen($username);
    $pass = strlen($password);
    $x = true;
}

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

<body class="font-poppins">
    <section class="flex flex-col items-center justify-center min-h-screen gap-4 bg-slate-900">
        <?php if (isset($user) && $user > 7) { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Password maksimal 6 karakter',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    color: '#fff',
                    background: '#1E293B'
                })
            </script>
        <?php $x = false;
        } ?>
        <?php if (isset($pass) && $pass < 10) { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Password minimal 10 karakter',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    color: '#fff',
                    background: '#1E293B'
                })
            </script>
        <?php $x = false;
        } ?>
        <?php if (isset($password) && !preg_match("/[A-Z]/", $password)) { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Password harus mengandung huruf kapital',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    color: '#fff',
                    background: '#1E293B'
                })
            </script>
        <?php $x = false;
        } ?>
        <?php if (isset($password) && !preg_match("/[a-z]/", $password)) { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Password harus mengandung huruf kecil',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    color: '#fff',
                    background: '#1E293B'
                })
            </script>
        <?php $x = false;
        } ?>
        <?php if (isset($password) && !preg_match("/[0-9]/", $password)) { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Password harus mengandung angka',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    color: '#fff',
                    background: '#1E293B'
                })
            </script>
        <?php $x = false;
        } ?>
        <?php if (isset($password) && !preg_match("/[^a-zA-Z\d]/", $password)) { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Password harus mengandung simbol',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    color: '#fff',
                    background: '#1E293B'
                })
            </script>
        <?php $x = false;
        } ?>
        <?php if ($x == true) {
            $_SESSION['login'] = $username;
            header('Location: dashboard.php');
        }
        ?>

        <div class="w-1/3 px-6 py-24 text-white border bg-slate-900 rounded-xl border-lime">
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold font-futura">Welcome to <span class="px-1 bg-lime text-slate-900">login</span></h1>
                <p class="text-sm">Inputkan data anda dengan benar</p>
            </div>
            <form class="flex flex-col w-9/12 mx-auto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="nudriin" class="p-2 mb-4 border rounded-lg border-lime bg-slate-800">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Rahasia12345" class="p-2 border rounded-lg border-lime bg-slate-800">
                <input type="button" name="show" id="show" class="mt-1 mb-6 text-right cursor-pointer" value="Show">
                <button type="submit" class="p-2 rounded-lg bg-lime text-slate-900 hover:bg-purple hover:text-white">Login</button>
            </form>
        </div>
    </section>
</body>
<script>
    const show = document.getElementById('show');
    const pass = document.getElementById('password');

    show.addEventListener('click', () => {
        if(show.value === "Show"){
            show.value = 'Hide';
            pass.setAttribute('type', 'text');
        } else {
            show.value = 'Show';
            pass.setAttribute('type', 'password');
        }
    })
</script>

</html>