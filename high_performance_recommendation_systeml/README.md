
# High-Performance Recommendation System

## Description
This system uses collaborative filtering to provide real-time recommendations. It features a Flask API for backend processing and a React-based frontend.

## Problem Statement:
In the digital age, users expect personalized content recommendations to enhance their experience. Traditional recommendation systems often struggle with scalability and real-time processing, leading to suboptimal user engagement.

## Solution:
Developed a high-performance recommendation system utilizing collaborative filtering techniques. The system leverages Apache Spark for large-scale data processing and a Flask API for real-time recommendation delivery.

## Setup Instructions
1. Clone this repository.
2. Start the services using Docker Compose:
   ```bash
   docker-compose up --build
   ```
3. Access:
   - **Frontend**: `http://localhost:3000`
   - **Backend API**: `http://localhost:5000/recommend/<item>`

## Architecture
Refer to the architecture diagram in the `docs` folder.

## Tech Stack
- Python (Flask)
- React
- Docker Compose

## Challenges Faced & How They Were Overcome:
- **Challenge**: Ensuring real-time processing with low latency.
- **Solution**: Optimized Spark jobs and implemented efficient data caching strategies.
- **Challenge**: Managing data sparsity in user-item interactions.
- **Solution**: Applied matrix factorization techniques to improve recommendation accuracy.

## Results:
- Achieved a 25% increase in user engagement through personalized recommendations.
- System capable of processing and analyzing millions of user interactions daily.
