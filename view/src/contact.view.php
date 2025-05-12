<section id="contact-section" class="full-section mb-4">
    <div class="container">
        <h2 class="h1-responsive font-weight-bold text-center my-4">Hubungi Kami</h2>
        <!-- Hero Section Start -->
        <div class="hero-contact mb-5" style="position:relative;overflow:hidden;border-radius:18px;">
            <img src="https://plus.unsplash.com/premium_vector-1711987589978-171fa8d26254?q=80&w=1152&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                alt="Contact Hero" 
                style="width:100%;height:260px;object-fit:cover;filter:brightness(0.7);border-radius:18px;">
            <div style="position:absolute;top:0;left:0;width:100%;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;">
                <h1 style="color:#fff;font-weight:bold;font-size:2.5rem;text-shadow:0 2px 8px rgba(0,0,0,0.3);margin-bottom:0.5rem;">
                    Hubungi Kami
                </h1>
                <p style="color:#fff;font-size:1.2rem;text-shadow:0 1px 6px rgba(0,0,0,0.2);max-width:600px;">
                    Kami siap membantu Anda! Silakan isi form di bawah ini untuk menghubungi tim kami secara langsung.
                </p>
            </div>
        </div>
        <!-- Hero Section End -->
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