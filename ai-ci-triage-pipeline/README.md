# AI-Powered Auto-Triage Pipeline for CI/CD Failures

## 🚀 Description
This system listens for CI/CD failures via GitHub Actions, fetches error logs, and sends them to a GPT-based AI engine for root-cause summarization and resolution suggestions. It then posts summaries to Slack, enabling engineers to debug failures faster.

## ❗ Problem Statement
Debugging CI/CD failures manually takes significant time and effort. Logs are long, inconsistent, and noisy—causing delays in identifying root causes.

## ✅ Solution
This project automates log triage by using OpenAI's GPT API to analyze failure logs, summarize issues, classify error types, and notify teams in real-time.

## 🧱 Features
- GitHub Actions failure detection
- GPT-based log summarization & fix suggestion
- Slack alert with failure summary & classification
- API service to receive GitHub Webhooks
- MongoDB/Postgres integration to track errors

## 🧪 Tech Stack
- GitHub Actions
- Python (FastAPI)
- OpenAI GPT API
- Slack API
- MongoDB (or PostgreSQL)

## 🧰 Folder Structure
```
auto-triage-ci-failures/
├── listener/            # Webhook receiver
│   └── main.py
├── ai_engine/           # GPT summarization logic
│   └── triage.py
├── notifier/            # Slack integration
│   └── slack_notify.py
├── .github/
│   └── workflows/
│       └── ci.yml       # Sample CI with forced failure
├── requirements.txt
├── README.md
└── docs/
    └── architecture.png
```

## 🚀 Deployment
1. Set your environment variables: `OPENAI_API_KEY`, `SLACK_WEBHOOK_URL`, `MONGO_URI`
2. Deploy using Docker:
```bash
docker build -t ai-ci-triage .
docker run -p 8000:8000 -e OPENAI_API_KEY=xxx -e SLACK_WEBHOOK_URL=xxx ai-ci-triage
```
3. Configure GitHub webhook to point to `http://<your-server>/webhook`

## 🖼️ Architecture
Refer to `docs/architecture.png` for system diagram
