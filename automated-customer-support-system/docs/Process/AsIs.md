# As-Is Process

```mermaid
flowchart LR
  Customer --> EmailSupport[Email Support]
  EmailSupport --> ManualEntry[Manual ticket entry]
  ManualEntry --> Queue[Generic queue]
  Queue --> Agent[Agent triage]
  Agent --> Report[Manual spreadsheet reporting]
```
