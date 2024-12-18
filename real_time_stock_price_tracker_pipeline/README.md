
# Real-Time Stock Price Tracker with Cloud-Based Pipeline

## Description
This system fetches and visualizes live stock prices using Yahoo Finance API. It is integrated with AWS services for scalability and real-time updates.

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
