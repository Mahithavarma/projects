## SupportOps_SLA_Backlog

I use this repo to make support ops predictable: hit SLAs, control backlog, and forecast staffing. It unifies ticket data, applies business-hours calendars + SLA policies, snapshots backlog daily, and gives me a loop: see risk → prioritize → act → measure.



## What’s Inside (essentials only)
	•	Business-hours aware SLA clocks (per region/brand/queue) with holidays + paused states.
	•	Backlog health: age, arrivals vs. completions, WIP, burn-down, and “SLA debt.”
	•	Breach risk signals and next-best-ticket hints.
	•	Forecasts: when backlog clears at current throughput; headcount needed to hit targets.

⸻

## Quick Start
	1.	Clone
$ git clone https://github.com/YOUR_ORG/SupportOps_SLA_Backlog.git
$ cd SupportOps_SLA_Backlog
	2.	Env + deps
$ python -m venv .venv && source .venv/bin/activate
$ pip install -r requirements.txt
	3.	Config
$ cp .env.example .env
Set: WAREHOUSE_TARGET (snowflake|bigquery|redshift), SCHEMA, and your source creds (e.g., ZENDESK_*, INTERCOM_TOKEN).
	4.	dbt profile (~/.dbt/profiles.yml)
Create a supportops_sla_backlog target pointing at your warehouse using the env vars above.
	5.	Build models
$ dbt deps
$ dbt build –select tag:staging tag:intermediate tag:marts

(Optional) Open the lightweight command center
$ streamlit run examples/support_command_center.py



## Minimal Configuration
	•	SLA policies: config/sla_policies.yml
Examples:
	•	P1 → First Response 15m, Resolution 2h, 24x7
	•	P3 → First Response 8h, Resolution 3d, business hours
Scope by brand/region/channel/tier.
	•	Calendars/holidays: config/calendars.yml (per region).



## Key Models
	•	stg_tickets_* — raw tickets, events, comments, assignee changes.
	•	stg_calendars — business hours + holidays.
	•	int_ticket_lifecycle — ordered states, first response, resolution, reopens.
	•	int_sla_clocks — SLA timers (business-hours aware, paused states handled).
	•	fct_sla_attainment — met vs. breached, minutes early/late, root cause.
	•	fct_backlog_snapshot — daily backlog with age, priority, queue, risk.


## Daily Use
	•	Rebuild incrementals (typical):
$ dbt build –vars ‘{as_of: “yesterday”}’ –select state:modified+
	•	Refresh backlog + attainment:
$ dbt build –select fct_backlog_snapshot fct_sla_attainment



## Dashboards (hook into your BI)Support Ops SLA & Backlog — staffing and SLA/CSAT.
	•	/dashboards/sla_overview.sql — attainment by queue/priority/tier.
  •	/dashboards/backlog_burndown.sql — burn-down + “minutes to green.”
