// public/firebase-messaging-sw.js
importScripts("https://www.gstatic.com/firebasejs/10.8.0/firebase-app-compat.js");
importScripts("https://www.gstatic.com/firebasejs/10.8.0/firebase-messaging-compat.js");

firebase.initializeApp({
    apiKey: "AIzaSyAqA24BXKhFhgWefDKfXnzfsxeB_wLetPE",
    authDomain: "peatun-8cec9.firebaseapp.com",
    projectId: "peatun-8cec9",
    messagingSenderId: "817643130821",
    appId: "1:817643130821:web:a2a33697784ddb999685ac",
    vapidKey: "BFYSRXBQzJU3BzGFBWCV2Q5MzyGR-DKLVrMqK-ZobjqWQiPxir6t5qm29o3603bxu2sCBpnm9BtLJuLgzp9wHoE"
});
const messaging = firebase.messaging();

messaging.onBackgroundMessage(function (payload) {
    self.registration.showNotification(payload.notification.title, {
        body: payload.notification.body,
        icon: payload.notification.icon
    });
});
