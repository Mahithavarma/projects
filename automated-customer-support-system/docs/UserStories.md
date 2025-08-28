# Epics and User Stories with Gherkin Acceptance Criteria

## Epic E1 Automated Ticket Intake and Classification
**Goal:** As a support manager, I want automatic intake and classification so tickets route correctly.

### US1 Create ticket via API
Given a valid authenticated request with required fields
When the system receives a new ticket
Then the ticket is created with a unique ID and initial status "New"

**Gherkin**
```
Feature: Create ticket
  Scenario: Create a valid ticket
    Given I have an authenticated API client
    And a payload with customer_id product channel priority and description
    When I POST to /tickets
    Then I receive 201 Created with ticket_id
    And the ticket status is New
```

### US2 Classify ticket intent
**Gherkin**
```
Feature: Classify ticket intent
  Scenario: Classification above threshold
    Given a ticket with description "Cannot login to account"
    When the classifier evaluates the ticket
    Then the system sets intent "Authentication"
    And intent_confidence is >= 0.80
```

### US3 SLA calculation and refresh
**Gherkin**
```
Feature: SLA refresh
  Scenario: SLA metrics refresh within SLA
    Given the dataset refresh is configured hourly
    When the pipeline completes
    Then end-to-end latency is < 5 minutes
```
