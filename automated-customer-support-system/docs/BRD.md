# Business Requirements Document

## 1. Objective
Improve customer support triage and reporting by enabling automated intake, accurate categorization, and trustworthy SLA monitoring.

## 2. Scope
In scope: ticket intake, classification, SLA tracking, Power BI reporting, role-based access.  
Out of scope: agent workforce management, billing.

## 3. Stakeholders
- Support Operations
- Product Owner
- Engineering
- Data Engineering
- Security and Compliance

## 4. Requirements Summary
- R1 Ticket intake must capture channel, priority, product, and customer identifiers.
- R2 System must classify intent with confidence and route to the correct queue.
- R3 SLA metrics must refresh hourly with latency < 5 minutes end-to-end.
- R4 Power BI must support role-level access and row-level security for teams.
- R5 PII must be masked in non-prod and encrypted at rest and in transit.

## 5. Success Metrics
- 15% improvement in SLA attainment within three months of go-live.
- 10% reduction in average handle time via better triage.
- 30% increase in executive visibility measured by dashboard usage.

## 6. Assumptions and Constraints
- Azure is the approved cloud.
- Data sources include CRM and ticketing exports.
- Production changes follow change control and UAT sign-off.

## 7. Acceptance Criteria Overview
See `UserStories.md` for Gherkin scenarios mapped to BRD items.
