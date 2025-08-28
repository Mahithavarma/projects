# Power BI Assets

Place sanitized `.pbix` files here. Suggested pages:
- Overview with volume, backlog, SLA attainment, CSAT
- Triage with queue distribution, intent classification, aging
- Team drilldown with RLS

## Example DAX Measures
```
Tickets = COUNTROWS('Tickets')
SLA Attainment % = DIVIDE([Tickets Within SLA], [Tickets])
CSAT % = AVERAGE('Survey'[CSAT])
```

## Refresh and Monitoring
- Incremental refresh on fact tables
- Data source credentials via service principal
- Alerts on refresh failure and refresh duration
