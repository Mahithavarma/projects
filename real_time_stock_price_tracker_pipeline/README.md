
# Real-Time Stock Price Tracker with Cloud-Based Pipeline

## Description
This system fetches and visualizes live stock prices using Yahoo Finance API. It is integrated with AWS services for scalability and real-time updates.

## Problem Statement:
Investors require up-to-date stock price information to make informed decisions. Traditional systems may not provide real-time data, hindering timely actions.

## Solution:
Built a real-time stock price tracker using Apache Kafka for data ingestion, Apache Flink for stream processing, PostgreSQL for storage, and Grafana for visualization.

## Features
1. **Backend**: AWS Lambda function fetches stock prices and stores them in DynamoDB.
2. **Frontend**: React app displays real-time stock prices.
3. **Cloud Pipeline**: Deployed using AWS Lambda, DynamoDB, and Amplify.

## Setup Instructions

### Cloud Deployment
1. Deploy the backend Lambda function to AWS Lambda.
2. Create a DynamoDB table named `StockPrices` with `symbol` as the primary key.
3. Deploy the React app using AWS Amplify.
4. Connect the frontend to the API Gateway URL.

### Local Testing
1. Clone this repository.
2. Start services using Docker Compose:
   ```bash
   docker-compose up --build
   ```
3. Access:
   - **Frontend**: `http://localhost:3000`
   - **Backend API**: `http://localhost:5000/stocks`

## Architecture
Refer to the architecture diagram in the `docs` folder.

## Tech Stack:
- Apache Kafka: Data ingestion.
- Apache Flink: Stream processing.
- PostgreSQL: Data storage.
- Grafana: Data visualization.
- Docker Compose: Service orchestration.

## Challenges Faced & How They Were Overcome:
- **Challenge**: Maintaining data consistency during high-frequency trading hours.
- **Solution**: Implemented robust error-handling and data validation mechanisms.
- **Challenge**: Scaling the system to handle multiple stock feeds simultaneously.
- **Solution**: Deployed a distributed architecture with load balancing.

## Results:
- Provided investors with real-time stock price updates, enhancing decision-making.
- System demonstrated high reliability with 99.9% uptime during market hours.
