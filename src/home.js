import {homehero1} from './components/homehero1';
import {homehero2} from './components/homehero2';
import {homehero3} from './components/homehero3';
import {homehero4} from './components/homehero4.js';
import {location} from './components/location.js'
export function home() {
    return `
    ${homehero1()}
    ${homehero2()}
    ${homehero3()}
    ${location()}
    ${homehero4()}
    `;
}