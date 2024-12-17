
// src/App.js
import React, { useState, useEffect } from 'react';
import axios from 'axios';

function App() {
  const [logs, setLogs] = useState([]);

  useEffect(() => {
    const fetchLogs = async () => {
      const res = await axios.post('http://localhost:9200/logs/_search', {
        query: { match_all: {} }
      });
      setLogs(res.data.hits.hits.map(hit => hit._source));
    };

    fetchLogs();
    const interval = setInterval(fetchLogs, 5000);
    return () => clearInterval(interval);
  }, []);

  return (
    <div style={{ padding: '20px' }}>
      <h1>Log Monitoring Dashboard</h1>
      <ul>
        {logs.map((log, index) => (
          <li key={index}>
            [{log.timestamp}] <strong>{log.service}</strong> - {log.level} - {log.message}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
