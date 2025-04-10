export function location() {
    const locationUrl = `https://www.google.com/maps?q=Ris+Cell+(perbaikan+ponsel)&ll=-6.109610493876925,106.71031907503681`;

    return `
        <div id="location-section" class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <!-- Embed Google Maps dengan Pin Merah -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.156575072146!2d106.71031907503681!3d-6.109610493876925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02cfe0ce5ae7%3A0xaa1dafc8ac1a583c!2sRis%20Cell%20(perbaikan%20ponsel)!5e0!3m2!1sid!2sid!4v1744271028102!5m2!1sid!2sid" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Lokasi Ris Cell (Perbaikan Ponsel)</h1>
                    <p class="lead">Kami berlokasi di Ris Cell, tempat terpercaya untuk perbaikan ponsel. Temukan kami di peta untuk informasi lebih lanjut.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="${locationUrl}" class="btn btn-primary btn-lg px-4 me-md-2" target="_blank" rel="noopener noreferrer">Kunjungi Kami</a>
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