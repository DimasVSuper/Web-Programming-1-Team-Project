export function location() {

    const location = `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d280.98339127073643!2d106.7272923886956!3d-6.14805721925982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7f961c04f65%3A0x91667efd0496a1cd!2sUniversitas%20Bina%20Sarana%20Informatika%20Kampus%20Cengkareng%20(UBSI%20Cengkareng)!5e0!3m2!1sid!2sid!4v1742365961099!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade`;
    return `
        <div id="location-section" class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <!-- Embed Google Maps dengan Pin Merah -->
                    <iframe src="${location}"></iframe>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Lokasi Universitas Bina Sarana Informatika</h1>
                    <p class="lead">Kampus Cengkareng adalah salah satu kampus UBSI yang berlokasi strategis di Jakarta Barat. Temukan kami di peta untuk informasi lebih lanjut.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="${location}" class="btn btn-primary btn-lg px-4 me-md-2" target="_blank" rel="noopener noreferrer">Kunjungi Kami</a>
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
    `;
}