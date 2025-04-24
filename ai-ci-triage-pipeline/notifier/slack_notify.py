import requests
import os

SLACK_WEBHOOK_URL = os.getenv("SLACK_WEBHOOK_URL")

def send_slack_message(text):
    payload = {"text": text}
    response = requests.post(SLACK_WEBHOOK_URL, json=payload)
    return response.status_code
