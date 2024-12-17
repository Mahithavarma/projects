
// src/App.js
import React, { useState, useEffect } from 'react';
import './App.css';

function App() {
  const [weather, setWeather] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch('http://localhost:5000/api/realtime');
      const result = await response.json();
      setWeather(result);
    };

    // Fetch every 5 seconds
    fetchData();
    const interval = setInterval(fetchData, 5000);
    return () => clearInterval(interval);
  }, []);

  return (
    <div className="App">
      <h1>Real-Time Analytics Dashboard</h1>
      {weather ? (
        <div>
          <h2>Live Weather Data</h2>
          <p>Temperature: {weather.temperature} &deg;C</p>
          <p>Wind Speed: {weather.windspeed} km/h</p>
          <p>Weather Code: {weather.weathercode}</p>
        </div>
      ) : (
        <p>Loading...</p>
      )}
    </div>
  );
}

export default App;
