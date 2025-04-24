from fastapi import FastAPI, Request
from ai_engine.triage import summarize_log
from notifier.slack_notify import send_slack_message

app = FastAPI()

@app.post("/webhook")
async def webhook_listener(request: Request):
    payload = await request.json()
    log = payload.get("log") or "No log received"
    summary = summarize_log(log)
    send_slack_message(summary)
    return {"status": "received"}
