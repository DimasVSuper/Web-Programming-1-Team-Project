import './components.css'

export function homehero4() {
    return `
        <!--Section: Kontak v.2-->
        <section id="contact-section" class="mb-4">
            <div class="container">
                <!--Judul Section-->
                <h2 class="h1-responsive font-weight-bold text-center my-4">Hubungi Kami</h2>
                <!-- Deskripsi-->
                <p class="text-center w-responsive mx-auto mb-5">
                    Ada pertanyaan atau butuh bantuan? Jangan ragu untuk menghubungi kami secara langsung. Tim kami akan segera menghubungi Anda dalam beberapa jam untuk membantu Anda.
                </p>

                <div class="row">
                    <!--Kolom Grid-->
                    <div class="col-md-8 mb-md-0 mb-5 mx-auto">
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                            <!--Baris Grid-->
                            <div class="row">
                                <!--Kolom Grid-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="name" class="">Nama Anda</label>
                                    </div>
                                </div>
                                <!--Kolom Grid-->

                                <!--Kolom Grid-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="email" class="">Email Anda</label>
                                    </div>
                                </div>
                                <!--Kolom Grid-->
                            </div>
                            <!--Baris Grid-->

                            <!--Baris Grid-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control">
                                        <label for="subject" class="">Subjek</label>
                                    </div>
                                </div>
                            </div>
                            <!--Baris Grid-->

                            <!--Baris Grid-->
                            <div class="row">
                                <!--Kolom Grid-->
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                        <label for="message">Pesan Anda</label>
                                    </div>
                                </div>
                            </div>
                            <!--Baris Grid-->
                        </form>

                        <div class="text-center text-md-left">
                            <a data-mdb-ripple-init class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Kirim</a>
                        </div>
                        <div class="status"></div>
                    </div>
                    <!--Kolom Grid-->

                    <!--Kolom Grid-->
                    <div class="col-md-4 text-center">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <i class="bi bi-geo-alt-fill fa-2x"></i>
                                <p>Jl. Kamal Raya No.#23, RT.3/RW.2, Tegal Alur, Kec. Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11820</p>
                            </li>

                            <li class="mt-4">
                                <i class="bi bi-telephone-fill fa-2x"></i>
                                <p>+62 812 3456 7890</p>
                            </li>

                            <li class="mt-4">
                                <i class="bi bi-envelope-fill fa-2x"></i>
                                <p>RissCell@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <!--Kolom Grid-->
                </div>
            </div>
        </section>
        <!--Section: Kontak v.2-->
    `;
}
