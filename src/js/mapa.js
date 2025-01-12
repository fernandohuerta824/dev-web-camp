document.addEventListener('DOMContentLoaded', e => {
    var map = L.map('mapa').setView([18.468639, -66.123163], 17);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        minZoom: 5,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.marker([18.468639, -66.123163]).addTo(map);
})