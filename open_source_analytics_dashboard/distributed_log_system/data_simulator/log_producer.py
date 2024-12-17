
from kafka import KafkaProducer
import json
import random
import time

producer = KafkaProducer(
    bootstrap_servers='localhost:9092',
    value_serializer=lambda v: json.dumps(v).encode('utf-8')
)

services = ['auth-service', 'payment-service', 'order-service', 'user-service']
log_levels = ['INFO', 'ERROR', 'WARNING', 'DEBUG']

while True:
    log_entry = {
        "timestamp": time.strftime("%Y-%m-%d %H:%M:%S"),
        "service": random.choice(services),
        "level": random.choice(log_levels),
        "message": "Simulated log message"
    }
    producer.send('logs', log_entry)
    print("Produced Log:", log_entry)
    time.sleep(2)
