
(function () {
   'use strict';
                
   document.addEventListener('DOMContentLoaded', function () {
var map = L.map('mapa').setView([10.504016, -66.917725], 16);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            L.marker([10.504016, -66.917725]).addTo(map)
            .bindPopup('GDLWebCamp 2020')
            .openPopup();
                })
            })();