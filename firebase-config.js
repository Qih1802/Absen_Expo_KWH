import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";

import {
  getFirestore
} from "https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyB1N2fBJBnEtQCQZ2hL-lny5HOAKuWQP74",
  authDomain: "absen-kwh.firebaseapp.com",
  databaseURL: "https://absen-kwh-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "absen-kwh",
  storageBucket: "absen-kwh.firebasestorage.app",
  messagingSenderId: "226187893806",
  appId: "1:226187893806:web:b82ffb3e01b3445cba13bf",
  measurementId: "G-4WR2HV9NFR"
};

const app = initializeApp(firebaseConfig);

export const db = getFirestore(app);