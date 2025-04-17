import './components.css';

export function homehero3() {
    return `
        <div class=" container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">Layanan Reparasi Handphone</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <!-- Perbaikan Hardware -->
                <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-tools"></i> <!-- Ikon Bootstrap untuk alat -->
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Perbaikan Hardware</h3>
                        <p>Kami menyediakan layanan perbaikan hardware seperti penggantian layar, baterai, kamera, dan komponen lainnya.</p>
                    </div>
                </div>

                <!-- Optimasi Performa -->
                <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-speedometer2"></i> <!-- Ikon Bootstrap untuk performa -->
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Optimasi Performa</h3>
                        <p>Layanan optimasi performa mencakup upgrade software, pembersihan sistem, dan penghapusan file yang tidak diperlukan.</p>
                    </div>
                </div>

                <!-- Keamanan Data -->
                <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-shield-lock"></i> <!-- Ikon Bootstrap untuk keamanan -->
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Keamanan Data</h3>
                        <p>Kami membantu Anda melindungi data penting dengan layanan backup, recovery, dan instalasi aplikasi keamanan.</p>
                    </div>
                </div>
            </div>
        </div>
    `;
}