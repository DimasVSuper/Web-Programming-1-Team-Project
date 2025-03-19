import './components.css';

export function homehero1() {
    return `
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Reparasi Handphone</h1>
                <h3 class="fw-normal text-muted mb-3">Reparasi Handphone</h3>
                
                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                    <a class="icon-link" href="#">
                        Learn more
                        <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                    <a class="icon-link" href="#">
                        Buy
                        <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
            
            <!-- Tambahkan gambar hero dengan z-index -1 -->
            <div class="hero-image-container">
                <img src="public/HP.png" alt="Reparasi Handphone" class="hero-image">
            </div>
        </div>
    `;
}
