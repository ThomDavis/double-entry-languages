
# Ledger
Top level model that contains 2 balances.

Assets balance = finance
Liabilities balance = income statements

## Structure

- Ledger
  - id (uuid)
  - name (name_of_language)
  - assets_balance (0 int)
  - liabilities_balance (0 int)
  - last_updated (datetime)
  - created_at (datetime)
  - checkout_resource (str)
  - checkout_at (datetime)

# Ledger Entry

## Structure

- Ledger Entry
  - id
  - ledger_id
  - asset_balance
  - liability_balance
  - created_at
  - created_resource
  - status (open, closed, error)
  - status_message

## Potential more fields

- description
- asset_debit
- asset_credit
- expense_debit
- expense_credit
- revenue_debit
- revenue_credit
- liability_debit
- liability_credit
- equity_debit
- equity_credit


# Ledger Entry Item

## Structure

- Ledger Entry Item
  - id
  - ledger_entry_id
  - account_id
  - asset_amount
  - liability_amount
  - processed_date
  - created_at
  - created_resource
  - currency (str)
  - description
  