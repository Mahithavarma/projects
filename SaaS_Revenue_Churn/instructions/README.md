SaaS_Revenue_Churn

I use this repo to make churn measurable, explainable, and fixable. It reconciles billing + product usage into audited revenue metrics (MRR/ARR, GRR/NRR, expansion/contraction/reactivation/logo churn), flags risk early, and gives me a tight loop: detect → prioritize → intervene → measure lift.


## Table of Contents
	•	What’s Inside
	•	Tech Stack
	•	Requirements
	•	Install
	•	Usage
	•	Dashboards & Notebooks
	•	Directory Layout
	•	Tests & Quality
	•	CI/CD
	•	Security & PII
	•	Troubleshooting
	•	Contributing
	•	Acknowledgments



## What’s Inside
	•	Warehouse-native models (dbt) that produce daily, reconciled MRR movements and NRR waterfalls that Finance/Product/Growth can all sign off on.
	•	Edge-case handling: mid-cycle upgrades/downgrades, seat changes, refunds/credits, trials→paid, grace periods, and multi-currency FX.
	•	Risk scoring (survival analysis + gradient boosting) using adoption, retries, ticket severity, and seat utilization.
	•	Playbooks: proactive outreach, dunning tweaks, save offers; tracked for incremental impact (not vanity “cancellations prevented”).
	•	Dashboards/notebooks to explore cohorts, retention, NRR drivers, and account-level risk.



## Tech Stack
	•	Languages: Python 3.10+, SQL
	•	Modeling: dbt Core (1.6+)
	•	Warehouses: Snowflake / BigQuery / Redshift (pick one)
	•	Sources: Stripe/Chargebee/Recurly; Segment/Amplitude/GA4; CRM exports (CSV/API)
	•	Viz (optional): Streamlit or notebooks
	•	ML (optional): scikit-learn, lifelines
	•	Tooling: Makefile, pre-commit, pytest, sqlfluff, ruff



## Requirements
	•	Python 3.10+
	•	dbt Core 1.6+ and access to a supported warehouse
	•	Warehouse role with create/read on schema(s)
	•	(Optional) Service account for BigQuery; key-pair or password for Snowflake
	•	(Optional) Streamlit for dashboard



## Install
	1.	Clone
$ git clone https://github.com/YOUR_ORG/SaaS_Revenue_Churn.git
$ cd SaaS_Revenue_Churn
	2.	Python env
$ python -m venv .venv && source .venv/bin/activate
$ pip install -r requirements.txt
	3.	Pre-commit hooks (lint/format/SQL style)
$ pre-commit install



## Metric definitions (auditable)
	•	MRR: monthlyized value of active subscription(s) net of discounts/credits/tax.
	•	NRR = (MRR_start + Expansion − Contraction − Churn + Reactivation) / MRR_start
	•	GRR = (MRR_start − Contraction − Churn) / MRR_start
	•	Logo churn: count of customers whose active subscriptions dropped to zero in period.
	•	Reactivation: MRR regained from previously churned logos.

Edge cases handled
	•	Mid-term upgrades/downgrades (proration to daily MRR).
	•	Seat-based plans (per-seat price × seats).
	•	Refunds/credits reversing revenue.
	•	Trials vs. paid (trial has zero MRR).
	•	Multi-currency via stg_fx_rates (daily close; configurable).
 ## Usage

One-time bootstrap
$ make seed                       # optional: dbt seed
$ dbt deps
$ dbt build –select tag:billing tag:revenue tag:cohorts

Daily/CI run
$ dbt build –vars ‘{run_start: “yesterday”}’ –select state:modified+

Produce NRR waterfall & cohorts
$ dbt build –select fct_nrr_waterfall fct_cohorts

Train churn-risk model (optional)
$ python pipelines/risk_train.py –warehouse $WAREHOUSE_TARGET –start 2024-01-01 –end 2025-01-01
$ python pipelines/risk_score.py –asof 2025-08-01

Quick Python example
from utils.queries import top_churn_drivers
df = top_churn_drivers(segment=“SMB”, lookback_days=180, top_k=10)
print(df)



## Dashboards & Notebooks
	•	/dashboards/nrr_waterfall.sql → base view for your BI tool
	•	/notebooks/01_cohort_retention.ipynb → cohort curves + survival
	•	/notebooks/02_risk_explain.ipynb → feature importances + SHAP examples
	•	Optional Streamlit starter:
$ streamlit run examples/churn_app.py



## Directory Layout

SaaS_Revenue_Churn/
├─ dbt_project.yml
├─ models/
│  ├─ staging/              (stg_billing_*, stg_product_usage, stg_fx_rates)
│  ├─ intermediate/         (int_subscriptions_daily, int_revenue_normalized)
│  ├─ marts/                (fct_mrr_movements, fct_nrr_waterfall, fct_cohorts)
│  └─ schema.yml            (tests + contracts)
├─ pipelines/               (risk_train.py, risk_score.py)
├─ utils/                   (sql helpers, queries, features/)
├─ notebooks/               (analysis notebooks)
├─ dashboards/              (BI-ready SQL)
├─ data/samples/            (optional seed CSVs)
├─ .env.example
└─ Makefile



## Tests & Quality
	•	dbt tests: not null, unique, accepted values, referential integrity
	•	Data contracts: schema-enforced types + constraints in schema.yml
	•	Unit tests: pytest for Python utilities and feature engineering
	•	Style: ruff, black, sqlfluff via pre-commit

Run everything
$ make test



## CI/CD
	•	Build: compile dbt, run unit tests, dry-run models on PR
	•	Deploy: run incremental models on merge to main
	•	Artifacts: upload docs + run results

Example GitHub Actions stub (.github/workflows/ci.yml)
name: ci
on: [push, pull_request]
jobs:
build:
runs-on: ubuntu-latest
steps:
- uses: actions/checkout@v4
- uses: actions/setup-python@v5
with: { python-version: “3.11” }
- run: pip install -r requirements.txt
- run: pre-commit run –all-files
- run: dbt deps && dbt compile
- run: pytest -q



## Security & PII
	•	Least-privilege warehouse roles; read-only sources where possible
	•	Hashed user/account IDs in derived tables; no raw PII exported
	•	Secrets via env vars or your secrets manager (no keys in code)
	•	Optional row-level security by account/region



## Troubleshooting
	•	Numbers don’t tie to billing → check timezone alignment + FX table date coverage
	•	Double counting MRR → ensure subscription overlap resolver ran (int_subscriptions_daily)
	•	NRR > 120% “too good” → inspect expansions from mid-cycle seat bumps (proration)
	•	BigQuery permissions → grant roles/bigquery.dataEditor on target dataset
	•	Snowflake warehouse suspended → set auto_resume=true or pick a bigger warehouse for the first full build



## Contributing

Small, focused PRs.
	•	Branches: feat/ or fix/
	•	Conventional commits (feat:, fix:, docs:, refactor:, test:)
	•	Add/extend tests and update docs for any model changes
	•	Run make test before pushing


⸻

## Acknowledgments

Thanks to the dbt, scikit-learn, and lifelines communities; and to the teams that inspired the edge-case handling in real SaaS billing systems.

