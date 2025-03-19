(function(){const i=document.createElement("link").relList;if(i&&i.supports&&i.supports("modulepreload"))return;for(const a of document.querySelectorAll('link[rel="modulepreload"]'))s(a);new MutationObserver(a=>{for(const e of a)if(e.type==="childList")for(const n of e.addedNodes)n.tagName==="LINK"&&n.rel==="modulepreload"&&s(n)}).observe(document,{childList:!0,subtree:!0});function t(a){const e={};return a.integrity&&(e.integrity=a.integrity),a.referrerPolicy&&(e.referrerPolicy=a.referrerPolicy),a.crossOrigin==="use-credentials"?e.credentials="include":a.crossOrigin==="anonymous"?e.credentials="omit":e.credentials="same-origin",e}function s(a){if(a.ep)return;a.ep=!0;const e=t(a);fetch(a.href,e)}})();function r(){return`
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-white text-dark">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Layanan Reparasi Handphone di Jakarta Barat</h1>
                <h3 class="fw-normal text-muted mb-3">Cepat, Terpercaya, dan Profesional</h3>
            </div>
            
            <!-- Tambahkan gambar hero dengan z-index -1 -->
            <div class="hero-image-container">
                <img src="public/HP.png" alt="Reparasi Handphone" class="hero-image">
            </div>
        </div>
    `}function l(){return`
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="../../public/Reparasi HP.png" class="d-block mx-lg-auto img-fluid" alt="Reparasi Handphone" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Layanan Reparasi Handphone</h1>
                    <p class="lead">Kami menyediakan layanan perbaikan handphone yang cepat dan terpercaya, termasuk penggantian layar, baterai, dan komponen lainnya. Temukan lokasi kami untuk mendapatkan layanan terbaik.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="#location-section" class="btn btn-primary btn-lg px-4">Lokasi</a>
                    </div>
                </div>
            </div>
        </div>
    `}function o(){return`
        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">Layanan Reparasi Handphone</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Perbaikan Hardware</h3>
                        <p>Kami menyediakan layanan perbaikan hardware seperti penggantian layar, baterai, kamera, dan komponen lainnya.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-cpu-fill"></i>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Optimasi Performa</h3>
                        <p>Layanan optimasi performa mencakup upgrade software, pembersihan sistem, dan penghapusan file yang tidak diperlukan.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Keamanan Data</h3>
                        <p>Kami membantu Anda melindungi data penting dengan layanan backup, recovery, dan instalasi aplikasi keamanan.</p>
                    </div>
                </div>
            </div>
        </div>
    `}function d(){return`
        <div id="location-section" class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <!-- Embed Google Maps dengan Pin Merah -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d280.98339127073643!2d106.7272923886956!3d-6.14805721925982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7f961c04f65%3A0x91667efd0496a1cd!2sUniversitas%20Bina%20Sarana%20Informatika%20Kampus%20Cengkareng%20(UBSI%20Cengkareng)!5e0!3m2!1sid!2sid!4v1742365961099!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Lokasi Universitas Bina Sarana Informatika</h1>
                    <p class="lead">Kampus Cengkareng adalah salah satu kampus UBSI yang berlokasi strategis di Jakarta Barat. Temukan kami di peta untuk informasi lebih lanjut.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Kunjungi Kami</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Hubungi Kami</button>
                    </div>
                    <!-- Daftar Landmark -->
                    <div class="mt-4">
                        <h2 class="h5">Landmark Terdekat:</h2>
                        <ul>
                            <li>Mal Taman Palem (2 km)</li>
                            <li>Bandara Soekarno-Hatta (10 km)</li>
                            <li>Rumah Sakit Cengkareng (3 km)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    `}function c(){return`
    ${r()}
    ${l()}
    ${o()}
    ${d()}
    `}document.querySelector("#app").innerHTML=c();
