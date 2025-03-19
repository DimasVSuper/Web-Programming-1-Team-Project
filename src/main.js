// filepath: c:\Users\Dimas\Documents\projectwebpro1\src\main.js
import './style.css';
import { home } from './home.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Render halaman utama langsung
document.querySelector('#app').innerHTML = home();