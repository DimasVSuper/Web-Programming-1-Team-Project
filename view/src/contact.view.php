<section id="contact-section" class="full-section mb-4">
    <div class="container">
        <h2 class="h1-responsive font-weight-bold text-center my-4">Hubungi Kami</h2>
        <p class="text-center w-responsive mx-auto mb-5">
            Ada pertanyaan atau butuh bantuan? Jangan ragu untuk menghubungi kami secara langsung. Tim kami akan segera menghubungi Anda dalam beberapa jam untuk membantu Anda.
        </p>

        <div class="row">
            <div class="col-md-8 mb-md-0 mb-5 mx-auto">
                <form id="contact-form" name="contact-form" action="?page=contact" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Nama Anda</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email Anda</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="subject" class="form-label">Subjek</label>
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Masukkan subjek pesan Anda" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="message" class="form-label">Pesan Anda</label>
                            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
                    </div>
                    <div id="back-home-btn" style="display:flex;justify-content:center;margin-top:20px;">
                        <a href="?page=home" class="btn btn-outline-secondary">Balik ke Beranda</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div id="notif-alert" style="display:none;position:fixed;top:30px;right:30px;z-index:9999;min-width:250px;"></div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var notif = document.getElementById('notif-alert');
    var status = null;
    <?php if(isset($_SESSION['status'])): ?>
        status = "<?=$_SESSION['status']?>";
    <?php endif; ?>
    if(status) {
        var msg = status==='success' ? 'Pesan berhasil dikirim!' : 'Gagal mengirim pesan. Silakan coba lagi.';
        var alertClass = status==='success' ? 'alert-success' : 'alert-danger';
        notif.innerHTML = '<div class="alert '+alertClass+' alert-dismissible fade show" role="alert">'+msg+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        notif.style.display = 'block';
        setTimeout(function(){
            notif.style.display = 'none';
        }, 4000);
        notif.querySelector('.btn-close').onclick = function(){ notif.style.display = 'none'; };
    }
});
</script>
<?php if(isset($_SESSION['status'])) unset($_SESSION['status']); ?>