
# High-Performance Recommendation System

## Description
This system uses collaborative filtering to provide real-time recommendations. It features a Flask API for backend processing and a React-based frontend.

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
