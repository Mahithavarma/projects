
// src/App.js
import React, { useState } from 'react';
import axios from 'axios';

function App() {
  const [item, setItem] = useState('');
  const [recommendations, setRecommendations] = useState([]);

  const fetchRecommendations = async () => {
    try {
      const response = await axios.get(`http://localhost:5000/recommend/${item}`);
      setRecommendations(response.data.recommendations || []);
    } catch (error) {
      console.error('Error fetching recommendations:', error);
    }
  };

  return (
    <div style={{ padding: '20px' }}>
      <h1>Recommendation System</h1>
      <input
        type="text"
        placeholder="Enter an item"
        value={item}
        onChange={(e) => setItem(e.target.value)}
        style={{ marginRight: '10px' }}
      />
      <button onClick={fetchRecommendations}>Get Recommendations</button>
      <ul>
        {recommendations.map((rec, index) => (
          <li key={index}>{rec}</li>
        ))}
      </ul>
    </div>
  );
}

export default App;
