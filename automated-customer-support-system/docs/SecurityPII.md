# Security and PII Handling

- PII fields: name, email, phone, address.
- Mask PII in non-production environments.
- Encrypt at rest with Azure SQL TDE and in transit with TLS 1.2+.
- Access controlled via Azure AD groups with least privilege.
- Audit access to PII and maintain quarterly reviews.
