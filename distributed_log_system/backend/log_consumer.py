
from kafka import KafkaConsumer
from elasticsearch import Elasticsearch
import json

consumer = KafkaConsumer(
    'logs',
    bootstrap_servers='localhost:9092',
    value_deserializer=lambda x: json.loads(x.decode('utf-8'))
)

es = Elasticsearch([{'host': 'localhost', 'port': 9200}])

for message in consumer:
    log_entry = message.value
    es.index(index="logs", body=log_entry)
    print("Indexed Log:", log_entry)
