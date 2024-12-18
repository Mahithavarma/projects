
// src/App.js
import React, { useState, useEffect } from 'react';
import axios from 'axios';

function App() {
  const [stocks, setStocks] = useState([]);

  useEffect(() => {
    const fetchStocks = async () => {
      try {
        const res = await axios.get('https://your-api-gateway-url.amazonaws.com/stocks'); // Replace with API Gateway URL
        setStocks(res.data);
      } catch (error) {
        console.error('Error fetching stock data:', error);
      }
    };

    fetchStocks();
  }, []);

  return (
    <div style={{ padding: '20px' }}>
      <h1>Real-Time Stock Price Tracker</h1>
      <ul>
        {stocks.map((stock, index) => (
          <li key={index}>
            {stock.symbol}: ${stock.price.toFixed(2)}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
