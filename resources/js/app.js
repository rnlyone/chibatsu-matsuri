import './bootstrap';
import './sw';

// app.js
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('/sw.js');
    });
  }
