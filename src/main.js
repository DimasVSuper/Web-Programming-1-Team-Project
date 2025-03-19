import './style.css';
import { body } from './body.js';

document.querySelector('#app').innerHTML = `
    ${body()}
`;