import React from 'react';
import { createRoot } from 'react-dom/client';
import MainPage from './pages/MainPage'; 
import './pages/main.css'; 

const App = () => {
  return (
    <MainPage />
  );
};

createRoot(document.getElementById('app')).render(<App />);
