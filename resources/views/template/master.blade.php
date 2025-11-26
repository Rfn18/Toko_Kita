<!doctype html>
<html lang="en">
@include('template.header')
<main>
    @yield('content')
</main>
@include('template.bottomNav')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toast = document.getElementById("toast");

        if (toast) {
            // Hilang setelah 3 detik
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        }
    });
</script>

</html>
