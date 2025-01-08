
# Distributed Log Aggregation System

## Description
A real-time distributed system for log aggregation, storage, and querying.

## Problem Statement:
Modern applications generate vast amounts of log data that need to be collected, stored, and analyzed in real-time to monitor system health, detect anomalies, and gain insights. Traditional logging systems often struggle with scalability, fault tolerance, and real-time processing capabilities.

## Solution:
Developed a scalable and fault-tolerant distributed logging system capable of real-time log data ingestion, processing, and storage. The system leverages Apache Kafka for high-throughput data ingestion, Apache Spark for real-time stream processing, and HDFS for distributed storage. Monitoring and visualization are facilitated through Grafana and Prometheus.

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

## Challenges Faced & How They Were Overcome:
-	Challenge: Ensuring exactly-once processing semantics.
-	Solution: Implemented idempotent producers and consumers in Kafka to prevent duplicate message processing.
-	Challenge: Managing storage for high-volume log data.
-	Solution: Employed HDFS for scalable storage and implemented data retention policies to manage disk space.

## Results/Impact:
- Achieved real-time processing of log data with minimal latency.
- Improved system reliability and scalability, capable of handling millions of log entries per second.
- Enhanced monitoring and alerting facilitated proactive issue detection and resolution.

