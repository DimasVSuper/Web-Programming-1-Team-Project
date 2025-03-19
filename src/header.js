import './style.css';

export function header() {
    return `
    <div class="container">
      <header class="d-flex justify-content-between align-items-center py-3">
        <h1 class="fs-4">Reparasi Toko Alexa</h1>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="#home" class="nav-link" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
        </ul>
      </header>
    </div>
    `;
}