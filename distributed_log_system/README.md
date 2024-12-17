
# Distributed Log Aggregation System

## Description
A real-time distributed system for log aggregation, storage, and querying.

## Features
1. **Real-Time Simulation**: Logs are generated using Kafka Producers.
2. **Backend Pipeline**: Logs are consumed and stored into Elasticsearch.
3. **React Dashboard**: Real-time UI to visualize logs.

## Setup Instructions

1. Clone the repository and navigate to the project directory.
2. Start all services using Docker Compose:
   ```bash
   docker-compose up --build
   ```
3. Access the following:
   - **Elasticsearch**: `http://localhost:9200`
   - **React Dashboard**: `http://localhost:3000`

## Tech Stack
- Kafka (Log Streaming)
- Elasticsearch (Storage & Querying)
- React (Dashboard)
- Docker Compose (Deployment)
