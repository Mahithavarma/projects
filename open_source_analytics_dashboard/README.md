
# Open-Source Analytics Dashboard (Real-Time Integration)

## Description
A real-time analytics dashboard that fetches and displays live weather data every 5 seconds. It demonstrates a clean architecture with React (frontend), Flask (backend), and real-time API integration.

## Architecture
The system is composed of the following components:

1. **Frontend (React)**: Displays real-time weather data fetched from the backend.
2. **Backend (Flask)**: Fetches live data from the public Open-Meteo weather API.
3. **External API**: Open-Meteo API serves real-time weather metrics.
4. **Deployment**: Docker Compose to manage the frontend and backend services.

### Architecture Diagram
Refer to the `docs/architecture.txt` file for a visual overview.

## Features
- Real-time updates fetched every 5 seconds.
- Dynamic and responsive dashboard built with React.
- Dockerized deployment for quick setup and scalability.

## Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/open-source-analytics-dashboard.git
   cd open-source-analytics-dashboard
   ```

2. Start the application using Docker Compose:
   ```bash
   docker-compose up --build
   ```

3. Access the dashboard at `http://localhost:3000`.

## Tech Stack
- **Frontend**: React
- **Backend**: Flask
- **API**: Open-Meteo Weather API
- **Deployment**: Docker Compose

## License
MIT License