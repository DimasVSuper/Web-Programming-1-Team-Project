import './components.css';

export function homehero1() {
    return `
        <div class="full-section overflow-hidden p-3 p-md-5 m-md-3 text-center bg-white text-dark">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Layanan Reparasi Handphone di Jakarta Barat</h1>
                <h3 class="fw-normal text-muted mb-3">Cepat, Terpercaya, dan Profesional</h3>
            </div>
            
            <!-- Tambahkan gambar hero dengan z-index -1 -->
            <div class="hero-image-container">
                <img src="HP.png" alt="Reparasi Handphone" class="hero-image">
            </div>
        </div>
    `;
}