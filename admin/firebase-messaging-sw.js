importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
    databaseURL: "YOUR_FIREBASE_DATBASE_URL",
    apiKey: "AIzaSyA8JfpO8BERB7MXgOL8ZspC1RMNOa8a7Z4",
    authDomain: "admin-food-f417a.firebaseapp.com",
    projectId: "admin-food-f417a",
    storageBucket: "admin-food-f417a.appspot.com",
    messagingSenderId: "189041603222",
    appId: "1:189041603222:web:061ce3241cfae309bfc8b7",
    measurementId: "G-81XBYLWDJE"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});


 
