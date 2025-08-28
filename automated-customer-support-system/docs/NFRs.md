# Non-Functional Requirements

- Latency: end-to-end refresh < 5 minutes for hourly updates.
- Availability: 99.9% for API and reporting during business hours.
- Data Quality: completeness >= 99%, validity >= 98%, reconciliation daily with thresholds and alerts.
- Security: RLS in Power BI, least-privilege access, PII masked in non-prod, encryption at rest and in transit.
- Observability: dashboards for refresh success, latency, and row-level security access errors.
